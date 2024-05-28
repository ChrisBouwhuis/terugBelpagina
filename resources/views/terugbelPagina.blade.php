<x-head-nav-footer
    :pageName="'Contact'"
>

    <div class="grid justify-items-center mb-5">
        <h1 class="text-3xl font-semibold">Hey, heeft u nog vragen maar, praat u liever via de telefoon?</h1>
        <p class="text-xl">vul dan hier onder alle velden in en dan proberen wij u zo snel mogelijk terug te bellen</p>
    </div>
    <div class="flex justify-center mt-4">
        <form class="bg-slate-100 max-w-min pb-8 px-8 pt-3 rounded-lg border-black border-2">
            <x-input-fields.text-input
                heading="Naam"
                example="Jouw naam"
                icon="user"
                iconType="regular"
                type="text"
            />
            <x-input-fields.text-input
                heading="Telefoonnummer"
                example="06-12345678"
                icon="phone"
                iconPosition="row"
                iconType="regular"
                type="text"
            />
            <x-input-fields.text-input
                heading="Email"
                example="voorbeeld.email.com"
                icon="envelope"
                iconPosition="row"
                iconType="regular"
                type="email"
            />
            <div class="h-[8rem]">
                <x-input-fields.text-block
                    heading="Onderwerp"
                    example="plaats hier uw onderwerp"
                    icon="comment"
                    iconType="regular"
                    type="text"
                />
            </div>
            <x-input-fields.submit-button
                text="Verstuur"
            />

        </form>
    </div>
</x-head-nav-footer>
