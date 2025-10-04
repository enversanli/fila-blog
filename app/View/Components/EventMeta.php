<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventMeta extends Component
{
    public $title;
    public $description;
    public $keywords;
    public $ticket;
    public $phone;
    public $mail;
    public $event;

    /**
     * Create a new component instance.
     *
     * @param  $event
     */
    public function __construct($event)
    {
        $this->event = $event;

        $meta = $event->meta ?? [];

        $this->title = $meta['meta_title'] ?? $event->title;
        $this->description = $meta['seo_description'] ?? \Illuminate\Support\Str::limit(strip_tags($event->text ?? ''), 160);
        $this->keywords = isset($meta['keywords']) ? array_map('trim', explode(',', $meta['keywords'])) : [];
        $this->ticket = $meta['ticket'] ?? null;
        $this->phone = $meta['phone'] ?? null;
        $this->mail = $meta['mail'] ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.event-meta');
    }
}
