<div>
    <select
        wire:model="status" 
        class="appearance-none bg-[#0a0a0a] border border-gray-800 text-gray-400 text-xs font-sci-fi uppercase tracking-wider rounded px-3 py-1.5 focus:outline-none focus:border-[#39FF14] focus:text-white hover:border-gray-600 transition-all duration-300 cursor-pointer">
        <option value="pending" class="bg-[#0a0a0a] text-yellow-500">PENDING</option>
        <option value="processing" class="bg-[#0a0a0a] text-blue-500">PROCESSING</option>
        <option value="shipped" class="bg-[#0a0a0a] text-purple-500">SHIPPED</option>
        <option value="delivered" class="bg-[#0a0a0a] text-[#39FF14]">DELIVERED</option>
        <option value="cancelled" class="bg-[#0a0a0a] text-red-500">CANCELLED</option>
    </select>
</div>