{{-- @props('user') --}}
<tr class="group hover:bg-gray-900/30 transition-colors">
    <td class="p-5">
        <div class="flex items-center gap-3">
            <img src="https://ui-avatars.com/api/?name=Admin+Vortex&background=39FF14&color=000"
                class="w-10 h-10 rounded-xl border border-[#39FF14]/50" alt="Admin">
            <div>
                <p class="font-bold text-white flex items-center gap-2">
                    {{ $user->name }}
                    <svg class="w-3 h-3 text-[#39FF14]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </p>
                <p class="text-xs text-gray-500">{{ $user->email }}</p>
            </div>
        </div>
    </td>
    <td class="p-5">

        <form action="{{ route('users.update', $user->id) }}" class="space-y-3" id="user-role-form-{{ $user->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="page" value="{{ request('page', 1) }}">
            <div class="flex flex-wrap gap-3">
                @foreach ($allRoles as $role)
                    @if ($role->name !== 'admin')
                        <label class="inline-flex items-center {{$user->status==='banned'? 'cursor-not-allowed':'cursor-pointer'}} group">
                            <input type="checkbox"  {{ $user->hasRole($role->name) ? 'checked' : '' }} name="role"
                                value="{{ $role->name }}" class="sr-only peer " onchange="handleRoleChange(this, '{{ $user->id }}')">

                            <div
                                class="relative w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-{{$user->status==='banned'?'disabled':'checked'}}:after:translate-x-full peer-{{$user->status==='banned'?'disabled':'checked'}}:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-{{$user->status==='banned'?'disabled':'checked'}}:bg-{{ $user->status==='banned'?'[#FF0000]':'[#39FF14]' }}">
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-300 group-hover:text-white transition-colors">
                                {{ $role->name }}
                            </span>
                        </label>
                    @endif
                @endforeach
            </div>

        </form>

    </td>
    <td class="p-5">
        <div class="flex items-center gap-2">
            <span
                class="w-2 h-2 rounded-full bg-{{ $user->status == 'active' ? '[#39FF14]' : '[#FF0000]' }} shadow-[0_0_10px_{{ $user->status == 'active' ? '[#39FF14]' : '[#FF0000]' }}]"></span>
            <span
                class="text-{{ $user->status == 'active' ? '[#39FF14]' : '[#FF0000]' }} text-xs font-bold">{{ $user->status }}</span>
        </div>
    </td>
    <td class="p-5 text-gray-500 text-xs">{{ $user->created_at->diffForHumans() }}</td>
    <td class="p-5 text-right">
        <div class="flex items-center gap-2">
            @if ($user->status === 'active')
            <form action="{{ route('users.userStatus', $user->id) }}" method="POST" class="inline">
                @csrf
                <input type="hidden" name="page" value="{{ request('page', 1) }}">
                <button type="submit" class="text-xs text-gray-500">Banned</button>
            </form>
            @else
            <form action="{{ route('users.userStatus', $user->id) }}" method="POST" class="inline">
                @csrf
                <input type="hidden" name="page" value="{{ request('page', 1) }}">
                <button type="submit" class="text-xs text-gray-500">Unban</button>
            </form>
            @endif
        </div>
    </td>
</tr>

<script>
function handleRoleChange(checkbox, userId) {
    const form = document.getElementById('user-role-form-' + userId);
    const checkboxes = form.querySelectorAll('input[type="checkbox"]');
    
    if (checkbox.checked) {
        checkboxes.forEach(cb => {
            if (cb !== checkbox) {
                cb.checked = false;
            }
        });
    }
    
    form.submit();
}
</script>