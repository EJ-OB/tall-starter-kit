<?php

namespace App\Toast;

use App\Enums\ToastVariant;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;
use Livewire\Wireable;
use Throwable;

class Toast implements Arrayable, Htmlable, Wireable
{
    protected string $view = 'toast.index';

    protected const int DEFAULT_DURATION = 2500;

    public function __construct(
        protected string $id,
        protected ?string $title = null,
        protected ?string $message = null,
        protected ?string $icon = null,
        protected ?ToastVariant $variant = null,
        protected int|string|null $duration = self::DEFAULT_DURATION,
    ) {}

    public static function make(?string $id = null): static
    {
        return app(static::class, ['id' => $id ?? Str::orderedUuid()]);
    }

    public static function fromArray(array $toast): static
    {
        $static = static::make($toast['id'] ?? Str::orderedUuid());

        $variant = $toast['variant'] ?? null;

        if (is_string($variant)) {
            $variant = ToastVariant::tryFrom($variant);
        }

        return $static
            ->title($toast['title'] ?? null)
            ->message($toast['message'] ?? null)
            ->icon($toast['icon'] ?? null)
            ->duration($toast['duration'] ?? self::DEFAULT_DURATION)
            ->variant($variant);
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
        return static::fromArray($value);
    }

    public function send(): static
    {
        session()->push('laravel.toast', $this);

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function title(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function message(?string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function icon(?string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function variant(?ToastVariant $variant): static
    {
        $this->variant = $variant;

        return $this;
    }

    public function getVariant(): ?ToastVariant
    {
        return $this->variant;
    }

    public function duration(int|string|null $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getDuration(): int|string|null
    {
        return $this->duration;
    }
}
