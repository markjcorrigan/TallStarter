<section class="w-full">
    <x-page-heading>
        <x-slot:title>
            {{__('permissions.create_permission')}}
        </x-slot:title>
        <x-slot:subtitle>
            {{__('permissions.create_permission_description')}}
        </x-slot:subtitle>
    </x-page-heading>

    <x-form wire:submit="createPermission" class="space-y-6">
        <flux:input wire:model.live="name" label="{{ __('permissions.name') }}" />
        <flux:button type="submit" icon="save" variant="primary">
            {{ __('permissions.create_permission') }}
        </flux:button>
    </x-form>

</section>
