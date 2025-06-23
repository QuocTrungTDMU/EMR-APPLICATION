<?php

namespace App\View\Components\Notifications;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Dropdown extends Component
{
    public $notifications;
    public $unreadCount;

    public function __construct()
    {
        $this->notifications = collect();
        $this->unreadCount = 0;

        // Chỉ load nếu user đã login
        if (Auth::check()) {
            try {
                $this->loadNotificationsFromNKS();
            } catch (\Exception $e) {
                // Log error but don't break the page
                Log::warning('Failed to load notifications for dropdown', [
                    'user_id' => Auth::id(),
                    'error' => $e->getMessage()
                ]);
            }
        }
    }

    private function loadNotificationsFromNKS()
    {
        try {
            $response = Http::timeout(10)->post('https://account.nks.vn/api/nks/notifications', [
                'user_id' => Auth::id()
            ]);

            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['data']) && is_array($data['data'])) {
                    $this->notifications = collect($data['data'])->take(5)->map(function ($item) {
                        return (object)[
                            'id' => $item['id'],
                            'title' => $item['title'],
                            'body' => $item['body'],
                            'created_at' => now()->parse($item['created_at']),
                            'read_at' => isset($item['read_at']) ? now()->parse($item['read_at']) : null,
                            'formatedCreatedDate' => $item['formatedCreatedDate'] ?? '',
                            'is_read' => !is_null($item['read_at'] ?? null),
                            'icon_class' => !is_null($item['read_at'] ?? null) ? 'text-green-500' : 'text-red-500',
                            'title_class' => !is_null($item['read_at'] ?? null) ? 'font-normal' : 'font-bold'
                        ];
                    });

                    $this->unreadCount = $this->notifications->where('is_read', false)->count();
                }
            }
        } catch (\Exception $e) {
            Log::error('NKS API error in dropdown component', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);
        }
    }

    public function render()
    {
        return view('components.notifications.dropdown');
    }
}
