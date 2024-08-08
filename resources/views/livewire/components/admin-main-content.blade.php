<div>
    @if($activeTab == 'dashboard')
        <h1 class="text-2xl font-bold">Dashboard Content</h1>
        <!-- Add your dashboard content here -->
    @elseif($activeTab == 'users')
        <h1 class="text-2xl font-bold">Users Management</h1>
        <!-- Add your users management content here -->
    @elseif($activeTab == 'settings')
        <h1 class="text-2xl font-bold">Settings</h1>
        <!-- Add your settings content here -->
    @else
        <h1 class="text-2xl font-bold">Welcome</h1>
        <!-- Add default content or a message here -->
    @endif
</div>
