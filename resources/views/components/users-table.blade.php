  <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#0f0f0f] text-gray-500 text-[10px] uppercase tracking-widest border-b border-gray-800">
                    <th class="p-5 font-medium">User Profile</th>
                   @role('admin') <th class="p-5 font-medium">Role</th> @endrole
                    <th class="p-5 font-medium">Status</th>
                    <th class="p-5 font-medium">Joined</th>
                    <th class="p-5 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-900 text-sm">
                
               
            @foreach ($users as $user)
            @if (!$user->hasRole('admin'))
            <x-user-card :user="$user " :allRoles="$allRoles"/>
            @endif
            @endforeach
            </tbody>
        </table>