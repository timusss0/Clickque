
    <h1 class="text-2xl font-bold mb-8">Clickque</h1>
    <ul>
        <li class="mb-4">
            <a 
                class="flex items-center p-2 rounded-lg 
                {{ request()->routeIs('dashboard.index') ? 'bg-blue-500 text-white' : 'hover:bg-blue-200 focus:ring-2 focus:ring-blue-300' }}" 
                href="{{ route('dashboard.index') }}">
                <i class="fa-solid fa-house-chimney"></i>
                <i class="fas fa-home mr-3"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="mb-4">
            <a 
                class="flex items-center p-2 rounded-lg 
                {{ request()->routeIs('static') ? 'bg-blue-500 text-white' : 'hover:bg-blue-200 focus:ring-2 focus:ring-blue-300' }}" 
                href="{{ route('static') }}">
                <i class="fas fa-chart-bar mr-3"></i>
                <span>Statistic</span>
            </a>
        </li>
        <li class="mb-4">
            <a 
            class="flex items-center p-2 rounded-lg 
            {{ request()->routeIs('settings') ? 'bg-blue-500 text-white' : 'hover:bg-blue-200 focus:ring-2 focus:ring-blue-300' }}" 
            href="{{ route('settings') }}">
            <i class="fas fa-cog mr-3"></i>
            <span>Settings</span>
        </a>
        </li>
        <li class="mb-4">
            <a 
            class="flex items-center p-2 rounded-lg 
            {{ request()->routeIs('help') ? 'bg-blue-500 text-white' : 'hover:bg-blue-200 focus:ring-2 focus:ring-blue-300' }}" 
            href="{{ route('help') }}">
            <i class="fas fa-question-circle mr-3"></i>
            <span>Help</span>
        </a>
        </li>
        <li class="mb-4">
            <a 
            class="flex items-center p-2 rounded-lg 
            {{ request()->routeIs('feedback') ? 'bg-blue-500 text-white' : 'hover:bg-blue-200 focus:ring-2 focus:ring-blue-300' }}" 
            href="{{ route('feedback') }}">
            <i class="fas fa-star mr-3"></i>
            <span>Feedback</span>
        </a>
        </li>
        <li class="mb-4">
            <a 
            class="flex items-center p-2 rounded-lg 
            {{ request()->routeIs('logoutView') ? 'bg-blue-500 text-white' : 'hover:bg-blue-200 focus:ring-2 focus:ring-blue-300' }}" 
            href="{{ route('logoutView') }}">
            <i class="fas fa-sign-out-alt mr-3"></i>
            <span>Logout</span>
        </a>
        </li>
    </ul>
</div>
