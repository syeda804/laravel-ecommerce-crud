<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-900 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Banner - IMPROVED -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-1">
                    Welcome Back, {{ auth()->user()->name }}! 👋
                </h3>
                <p class="text-gray-600 text-sm">
                    Manage your posts and content easily from your dashboard.
                </p>
            </div>

            <!-- Total Posts Card -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 uppercase tracking-wide mb-2">TOTAL POSTS</p>
                        <p class="text-4xl font-bold text-gray-900">
                            {{ $totalPosts }}
                        </p>
                    </div>
                    <div class="bg-indigo-100 p-4 rounded-full">
                        <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Quick Action Card -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide mb-4">QUICK ACTION</p>
                <a href="{{ route('posts.create') }}" class="block">
                    <div class="flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200 border border-gray-200">
                        <span class="text-lg font-semibold text-gray-900">Create New Post</span>
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                </a>
            </div>

            <!-- Browse Card -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                <p class="text-sm font-medium text-gray-600 uppercase tracking-wide mb-4">BROWSE</p>
                <a href="{{ route('posts.index') }}" class="block">
                    <div class="flex items-center justify-between p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200 border border-gray-200">
                        <span class="text-lg font-semibold text-gray-900">All Your Posts</span>
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>
            </div>

            <!-- Recent Posts -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-900">
                        Recent Posts
                    </h3>
                    <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                        Last 5 posts
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b-2 border-gray-200">
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">TITLE</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">DATE</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            @forelse($recentPosts as $post)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-4 py-4 text-gray-900 font-medium">
                                        {{ $post->title }}
                                    </td>
                                    <td class="px-4 py-4 text-gray-600">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $post->created_at->format('d M Y') }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <a href="{{ route('posts.show', $post->id) }}" 
                                           class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-semibold text-sm">
                                            View →
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-8 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            <p class="text-gray-500 font-semibold text-lg">No posts found</p>
                                            <p class="text-gray-400 text-sm mt-2">Start by creating your first post!</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>