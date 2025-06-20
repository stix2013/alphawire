{{--
  Icon:     user-plus
  Usage:    <flux:icon.tabler.user-plus /> or <flux:icon name="tabler.user-plus" />
  Credits:  @tabler/icons (3.34.0) by codecalm
  Flux:     livewire/flux (v2.2.1) by Caleb Porzio
  Built:    2025-06-20 10:26:26
--}}


@props([
    'variant' => 'outline',
])

@php
$classes = Flux::classes('shrink-0')
    ->add(match($variant) {
        'outline' => '[:where(&)]:size-6',
        'solid' => '[:where(&)]:size-6',
        'mini' => '[:where(&)]:size-5',
        'micro' => '[:where(&)]:size-4',
    });
@endphp

<?php switch ($variant): case ('outline'): ?>
<svg {{ $attributes->class($classes) }} xmlns="http://www.w3.org/2000/svg" data-flux-icon="1" aria-hidden="true" data-slot="icon" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M16 19h6"></path><path d="M19 16v6"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path></svg>

        <?php break; ?>

    <?php case ('solid'): ?>
<svg {{ $attributes->class($classes) }} xmlns="http://www.w3.org/2000/svg" data-flux-icon="1" aria-hidden="true" data-slot="icon" fill="none" stroke="currentColor" stroke-width="1.5" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M16 19h6"></path><path d="M19 16v6"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path></svg>

        <?php break; ?>

    <?php case ('mini'): ?>
<svg {{ $attributes->class($classes) }} xmlns="http://www.w3.org/2000/svg" data-flux-icon="1" aria-hidden="true" data-slot="icon" fill="none" stroke="currentColor" stroke-width="1.5" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M16 19h6"></path><path d="M19 16v6"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path></svg>

        <?php break; ?>

    <?php case ('micro'): ?>
<svg {{ $attributes->class($classes) }} xmlns="http://www.w3.org/2000/svg" data-flux-icon="1" aria-hidden="true" data-slot="icon" fill="none" stroke="currentColor" stroke-width="1.5" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M16 19h6"></path><path d="M19 16v6"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path></svg>

        <?php break; ?>

<?php endswitch; ?>