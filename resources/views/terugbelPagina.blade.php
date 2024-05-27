<x-head-nav-footer
    :pageName="'Contact'"
>

    <div class="grid justify-items-center">
        <h1 class="text-3xl font-semibold">Hey, heeft u nog vragen maar, praat u liever via de telefoon?</h1>
        <p class="text-xl">vul dan hier onder alle velden in en dan proberen wij u zo snel mogelijk terug te bellen</p>
    </div>
    <div class="flex justify-center mt-4">
        <form class="bg-[#eccca2] max-w-min pb-8 px-8 pt-3 rounded-lg">
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
                example="example.email.com"
                icon="envelope"
                iconPosition="row"
                iconType="regular"
                type="email"
            />
        </form>
    </div>
</x-head-nav-footer>
