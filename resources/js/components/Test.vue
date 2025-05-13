<template>
    <div class="flex">
  <!-- Sidebar -->
  <aside class="w-64 h-screen bg-gray-800 text-white flex flex-col p-4 space-y-4">
    <div class="text-2xl font-bold mb-6">MyApp</div>
    <nav class="flex flex-col space-y-2">
      <a href="#" class="px-3 py-2 rounded hover:bg-gray-700">🏠 Dashboard</a>
      <a href="#" class="px-3 py-2 rounded hover:bg-gray-700">📁 Projects</a>
      <a href="#" class="px-3 py-2 rounded hover:bg-gray-700">📊 Reports</a>
      <a href="#" class="px-3 py-2 rounded hover:bg-gray-700">⚙️ Settings</a>
    </nav>
  </aside>

  <!-- Content -->
  <main class="flex-1 p-6 bg-gray-100">
    <h1 class="text-2xl font-semibold">Dashboard Content</h1>
    <!-- Your page content here -->
  </main>
</div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
