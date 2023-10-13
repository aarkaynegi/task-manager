document.addEventListener('DOMContentLoaded', () => {
  const taskList = document.getElementById('task-list');
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  function updateTaskPriorities(taskIds) {

    fetch('/update-task-priorities', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken
      },
      body: JSON.stringify({ taskIds }),
    })
      .then(response => response.json())
      .then(data => console.log(data))
      .catch(error => console.error('Error:', error));
  }

  new Sortable(taskList, {
    animation: 150,
    handle: '.handle',
    onEnd: (evt) => {
      const taskIds = Array.from(taskList.children).map(item => item.dataset.taskId);
      updateTaskPriorities(taskIds);
      refreshTasks();
    }
  });

  function refreshTasks() {
    fetch(`/getTasks`)
      .then(response => response.json())
      .then(data => {
        if (data.tasks.length > 0) {
          lastUpdated = Date.now();
          taskList.innerHTML = '';

          data.tasks.forEach(task => {
            const listItem = document.createElement('li');
            listItem.dataset.taskId = task.id;
            listItem.classList.add('mb-2', 'bg-white', 'border', 'border-gray-300', 'p-2', 'rounded');
            listItem.innerHTML = `
              <span class="handle text-gray-600 cursor-move">☰</span>
              ${task.name} <span class="text-gray-600">- Priority: ${task.priority}</span>
              <a href="/tasks/${task.id}/edit" class="text-blue-500 ml-2">Edit</a>
              <form action="/tasks/${task.id}" method="POST" style="display:inline;">
                <input type="hidden" name="_token" value="${csrfToken}">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="text-red-500 ml-2">Delete</button>
              </form>
            `;
            taskList.appendChild(listItem);
          });
        }
      })
      .catch(error => console.error('Error:', error));
  }

  // setInterval(refreshTasks, 5000);
});
