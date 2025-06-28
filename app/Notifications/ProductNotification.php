<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class ProductNotification extends Notification
{
    use Queueable;

    protected $product;
    protected $eventType;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\Product $product
     * @param string $eventType
     */
    public function __construct($product, $eventType)
    {
        $this->product = $product;
        $this->eventType = $eventType;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database']; // Store notifications in the database
    }

    /**
     * Get the array representation of the notification for the database.
     *
     * @param mixed $notifiable
     * @return DatabaseMessage
     */
    public function toDatabase($notifiable)
    {
        $message = '';
        $icon = '';

        switch ($this->eventType) {
            case 'created':
                $message = "Product '{$this->product->name}' has been created.";
                $icon = 'fa-shopping-cart';
                break;
            case 'updated':
                $message = "Product '{$this->product->name}' has been updated.";
                $icon = 'fa-edit';
                break;
            case 'stock_out':
                $message = "Product '{$this->product->name}' is out of stock.";
                $icon = 'fa-exclamation-triangle';
                break;
        }

        return new DatabaseMessage([
            'message' => $message,
            'product_id' => $this->product->id,
            'icon' => $icon,
            'url' => route('admin.products.show', $this->product->id),
        ]);
    }
}
