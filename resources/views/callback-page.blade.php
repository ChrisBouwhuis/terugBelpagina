<x-head-nav-footer
    :pageName="'Callback aanvraag'"
>
    <div class="grid place-items-center mt-8">
        <div class="border-black border-2 h-full p-4 rounded bg-slate-200/50">
            <h1 class="text-3xl font-bold text-center">Heeft u nog een vraag aan ons?</h1>
            <p class="text-center text-wrap max-w-[39rem]">Vul dan het onderstaande formulier in en wij nemen zo snel mogelijk contact met u op. wij helpen u graag!</p>
            <div class="max-w-[60rem] min-w-[40rem] border-black border-2 rounded-lg bg-slate-100 mt-8">
                <livewire:create-callback-order />
            </div>
        </div>
    </div>
</x-head-nav-footer>
