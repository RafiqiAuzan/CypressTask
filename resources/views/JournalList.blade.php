<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')

    <!-- Styles -->
    <style>

    </style>
</head>

<body class="antialiased">
    <div class="bg-[#DDE6ED] h-screen">
        <section class="">
            <div class="">
                <div class="container mx-auto pt-16">
                    <a
                        class="block ml-[394px] w-32 text-center p-2 mt-20 mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        href="/journal-add">
                        Add Journal
                    </a>
                    <div class="">
                        <div class="mx-auto  w-[750px] relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                            <td class="px-6 py-4">
                                                <a href="#" class="btn btn-sm btn-danger"
                                                    onclick="
                                                        event.preventDefault();
                                                        if (confirm('Do you want to remove this?')) {
                                                        document.getElementById('delete-row-{{ $journal->id }}').submit();
                                                        }">
                                                    delete
                                                </a>
                                                <form id="delete-row-{{ $journal->id }}"
                                                    action="{{ route('journals.destroy', ['id' => $journal->id]) }}"
                                                    method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf
                                                </form>
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
