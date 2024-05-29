<div class="p-6">
    <form wire:submit="save" class="grid grid-cols-12 gap-4">
        <div class="col-span-6">
            <x-input-fields.label
                :for="'firstName'"
                >
                Voornaam
            </x-input-fields.label>
            <x-input-fields.text-line
                :icon="'user'"
                :placeholder="'Jouw naam voornaam'"
                wire:model.live="form.firstName"
            />
            <div class="text-red-500 h-2">
                @error('form.firstName') {{ $message }} @enderror
            </div>
        </div>
        <div class="col-span-6">
            <x-input-fields.label
                :for="'lastName'"
            >
                Achternaam
            </x-input-fields.label>
            <x-input-fields.text-line
                :icon="'user'"
                :placeholder="'Jouw achternaam'"
                wire:model.live="form.lastName"
            />
            <div class="text-red-500 h-2">
                @error('form.lastName') {{ $message }} @enderror
            </div>
        </div>
        <div class="col-span-12">
            <x-input-fields.label
                :for="'phone'"
            >
                Telefoonnummer
            </x-input-fields.label>
            <x-input-fields.text-line
                :icon="'phone'"
                :placeholder="'06-12345678'"
                wire:model.live="form.phone"
            />
            <div class="text-red-500 h-2">
                @error('form.phone') {{ $message }} @enderror
            </div>
        </div>
        <div class="col-span-12">
            <x-input-fields.label
                :for="'email'"
            >
                Email
            </x-input-fields.label>
            <x-input-fields.text-line
                :icon="'envelope'"
                :placeholder="'voorbeeld.email.com'"
                wire:model.live="form.email"
            />
            <div class="text-red-500 h-2">
                @error('form.email') {{ $message }} @enderror
            </div>
        </div>
        <div class="col-span-12">
            <x-input-fields.label
                :for="'comment'"
            >
                Onderwerp
            </x-input-fields.label>
            <div class="h-[8rem] w-full">
                <x-input-fields.text-area
                    :icon="'comment'"
                    :placeholder="'plaats hier uw onderwerp'"
                    wire:model.live="form.comment"
                />
                <div class="text-red-500 h-2">
                    @error('form.comment') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-start-1 col-span-3 mt-2">
            <x-input-fields.animated-button
                type="submit"
            >
                Verstuur
            </x-input-fields.animated-button>
        </div>
    </form>
</div>
