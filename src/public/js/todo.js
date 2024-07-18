/** @type {HTMLElement[]} */
const todos = document.querySelectorAll(".todo-item")
todos.forEach(item => {
  item.addEventListener("click", () => {
    const isActive = item.classList.contains("active")
    for (const todo of todos) {
      todo.classList.remove("active")
    }
    if (!isActive) {
      item.classList.add("active")
    }
  })
})

function confirmDelete() {
  return confirm("本当に削除しますか？")
}