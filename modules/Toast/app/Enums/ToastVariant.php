<?php

namespace Modules\Toast\Enums;

enum ToastVariant: string
{
    case Danger = 'danger';
    case Info = 'info';
    case Success = 'success';
    case Warning = 'warning';
}
