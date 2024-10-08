<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cypress Task</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href={{asset('fontawesome-free-6.6.0-web/css/all.min.css')}} rel="stylesheet" />
    @vite('resources/css/app.css')

    <!-- Styles -->
    <style>

    </style>
</head>

<body class="antialiased">
    <div class="bg-[#2F3645] h-screen">
        <section class="">
            <div class="">
                <div class="container mx-auto pt-16">
                    <a
                        class="block ml-[394px] w-10 text-center p-1 mb-2 text-white bg-[#667c87] hover:bg-[#495961] font-medium rounded-lg"
                        href="/journal-add">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                    <div class="">
                        <div class="mx-auto  w-[750px] relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-white uppercase bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Date Published
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ACTION
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($journals as $journal)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $journal->journal_title }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $journal->journal_name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $journal->created_at }}
                                            </td>
                                            <td class="py-4 flex gap-4">
                                                <a href="#" class=" bg-[#712c2c] text-white py-1 px-2 rounded-lg"
                                                    onclick="
                                                        event.preventDefault();
                                                        if (confirm('Do you want to remove this?')) {
                                                        document.getElementById('delete-row-{{ $journal->id }}').submit();
                                                        }">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </a>
                                                <form id="delete-row-{{ $journal->id }}"
                                                    action="{{ route('journals.destroy', ['id' => $journal->id]) }}"
                                                    method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf
                                                </form>
                                                <a href="#" class="bg-[#667c87] text-white py-1 px-2 rounded-lg">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
