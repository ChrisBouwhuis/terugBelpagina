<div>
    <form  wire:submit="save" class="bg-slate-100 w-[35rem] pb-8 px-8 rounded-lg border-black border-2 grid grid-cols-12 gap-4 pt-5">
        @csrf
        <div class="col-span-6">
            <x-input-fields.text-input
                heading="Naam voornaam"
                example="Jouw naam voornaam"
                icon="user"
                iconType="regular"
                type="text"
                name="firstName"
            />
        </div>
        <div class="col-span-6">
            <x-input-fields.text-input
                heading="Achternaam"
                example="Jouw achternaam"
                icon="user"
                iconType="regular"
                type="text"
                name="lastName"
            />
        </div>
        <div class="col-span-12">
            <x-input-fields.text-input
                heading="Telefoonnummer"
                example="06-12345678"
                icon="phone"
                iconPosition="row"
                iconType="regular"
                type="text"
                name="phone"
            />
        </div>
        <div class="col-span-12">
            <x-input-fields.text-input
                heading="Email"
                example="voorbeeld.email.com"
                icon="envelope"
                iconPosition="row"
                iconType="regular"
                type="email"
                name="email"
            />
        </div>
        <div class="col-span-12">
            <div class="h-[8rem] w-fu">
                <x-input-fields.text-block
                    heading="Onderwerp"
                    example="plaats hier uw onderwerp"
                    icon="comment"
                    iconType="regular"
                    type="text"
                    name="comment"
                />
            </div>
        </div>
        <div class="col-start-1 col-span-3">
            <x-input-fields.submit-button
                text="Verstuur"
            />
        </div>
    </form>
</div>
