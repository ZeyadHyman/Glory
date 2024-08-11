<div>
    @if ($activeTab == 'dashboard')
        <h1 class="text-2xl font-bold">Dashboard Content</h1>

    @elseif($activeTab == 'users')
        <h1 class="text-2xl font-bold">Users Management</h1>

    @elseif($activeTab == 'settings')
        <h1 class="text-2xl font-bold">Settings</h1>

    @else
        <h1 class="text-2xl font-bold">Welcome</h1>

    @endif
</div>/
