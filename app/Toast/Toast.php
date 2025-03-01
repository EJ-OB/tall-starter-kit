<?php

namespace App\Toast;

use App\Enums\ToastVariant;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Htmlable;
use Livewire\Wireable;
use Throwable;

class Toast implements Htmlable, Arrayable, Wireable
{
    protected string $view = 'toast.index';

    public function __construct(
        protected string $id,
        protected string $title,
        protected ?string $message = null,
        protected ?string $icon = null,
        protected ToastVariant $variant = ToastVariant::Info,
        protected int|string|null $duration = null,
    ) {}

    public static function make(array $toast): static
    {
        $variant = $toast['variant'] ?? null;

        if  (is_string($variant)) {
            $variant = ToastVariant::tryFrom($variant);
        }

        return app(static::class, [
            'id' => $toast['id'],
            'title' => $toast['title'],
            'message' => $toast['message'] ?? null,
            'icon' => $toast['icon'] ?? null,
            'variant' => $variant ?? ToastVariant::Info,
            'duration' => $toast['duration'] ?? null,
        ]);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'message' => $this->getMessage(),
            'icon' => $this->getIcon(),
            'variant' => $this->getVariant(),
            'duration' => $this->getDuration(),
        ];
    }

    /**
     * @throws Throwable
     */
    public function toHtml(): string
    {
        return view($this->view, [
            ...$this->toArray(),
            'toast' => $this,
        ])->render();
    }

    public function toLivewire(): array
    {
        return $this->toArray();
    }

    public static function fromLivewire($value): static
    {
        return static::make($value);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function getVariant(): ToastVariant
    {
        return $this->variant;
    }

    public function getDuration(): int|string|null
    {
        return $this->duration;
    }
}
