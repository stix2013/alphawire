{{--
  Icon:     login
  Usage:    <flux:icon.tabler.login /> or <flux:icon name="tabler.login" />
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
<svg {{ $attributes->class($classes) }} xmlns="http://www.w3.org/2000/svg" data-flux-icon="1" aria-hidden="true" data-slot="icon" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path><path d="M21 12h-13l3 -3"></path><path d="M11 15l-3 -3"></path></svg>

        <?php break; ?>

    <?php case ('solid'): ?>
<svg {{ $attributes->class($classes) }} xmlns="http://www.w3.org/2000/svg" data-flux-icon="1" aria-hidden="true" data-slot="icon" fill="none" stroke="currentColor" stroke-width="1.5" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M15 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path><path d="M21 12h-13l3 -3"></path><path d="M11 15l-3 -3"></path></svg>

        <?php break; ?>

    <?php case ('mini'): ?>
<svg {{ $attributes->class($classes) }} xmlns="http://www.w3.org/2000/svg" data-flux-icon="1" aria-hidden="true" data-slot="icon" fill="none" stroke="currentColor" stroke-width="1.5" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M15 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path><path d="M21 12h-13l3 -3"></path><path d="M11 15l-3 -3"></path></svg>

        <?php break; ?>

    <?php case ('micro'): ?>
<svg {{ $attributes->class($classes) }} xmlns="http://www.w3.org/2000/svg" data-flux-icon="1" aria-hidden="true" data-slot="icon" fill="none" stroke="currentColor" stroke-width="1.5" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M15 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path><path d="M21 12h-13l3 -3"></path><path d="M11 15l-3 -3"></path></svg>

        <?php break; ?>

<?php endswitch; ?>