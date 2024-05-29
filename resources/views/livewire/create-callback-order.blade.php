<div class="">
    <form wire:submit="save" class="grid grid-cols-12 gap-4">
        <div class="col-span-6">
            <x-input-fields.text-line
                :icon="'user'"
                :placeholder="'Jouw naam voornaam'"
                wire:model="form.firstName"
            />
            <div class="text-red-500">
                @error('form.firstName') {{ $message }} @enderror
            </div>
        </div>
        <div class="col-span-6">
            <x-input-fields.text-line
                :icon="'user'"
                :placeholder="'Jouw achternaam'"
                wire:model="form.lastName"
            />
            <div class="text-red-500">
                @error('form.lastName') {{ $message }} @enderror
            </div>
        </div>
        <div class="col-span-12">
            <x-input-fields.text-line
                :icon="'phone'"
                :placeholder="'06-12345678'"
                wire:model="form.phone"
            />
            <div class="text-red-500">
                @error('form.phone') {{ $message }} @enderror
            </div>
        </div>
        <div class="col-span-12">
            <x-input-fields.text-line
                :icon="'envelope'"
                :placeholder="'voorbeeld.email.com'"
                wire:model="form.email"
            />
            <div class="text-red-500">
                @error('form.email') {{ $message }} @enderror
            </div>
        </div>
        <div class="col-span-12">
            <div class="h-[8rem] w-full">
                <x-input-fields.text-area
                    :icon="'comment'"
                    :placeholder="'plaats hier uw onderwerp'"
                    wire:model="form.comment"
                />
                <div class="text-red-500">
                    @error('form.comment') {{ $message }} @enderror
                </div>
            </div>
        </div>
        <div class="col-start-1 col-span-3">
            <x-input-fields.animated-button
                type="submit"
            >
                Verstuur
            </x-input-fields.animated-button>
        </div>
    </form>
</div>
