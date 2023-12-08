@props(['users' => $users])




<div class="relative overflow-x-auto">
    <table class=" text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Naam
            </th>
            <th scope="col" class="px-6 py-3">
                Ingeklokt
            </th>
        </tr>
        </thead>
        <tbody>

           @foreach($users as $user)
               <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                   {{ $user->name }}
                </td>
                <td class="px-6 py-4">
                   {{ $user->created_at }}
                </td>
               </tr>
           @endforeach

        </tbody>
    </table>
</div>




