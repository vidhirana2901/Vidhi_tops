class TaskList:
    def __init__(self):
        self.tasks = []

    def addTask(self, title: str):
        new_task = Task(title)
        self.tasks.append(new_task)

    def markTaskDone(self, index: int):
        if 0 <= index < len(self.tasks):
            self.tasks[index].markDone()
        else:
            print("Invalid task index!")

    def showTasks(self):
        print("\n--- TASK LIST ---")
        for i, task in enumerate(self.tasks, start=1):
            print(f"{i}. ", end="")
            task.display()


# --- Demonstration Routine ---
if __name__ == "__main__":
    my_task_list = TaskList()

    # 1. Add 3 tasks
    my_task_list.addTask("Complete SE Assignment")
    my_task_list.addTask("Review OOP Principles")
    my_task_list.addTask("Submit Project Proposal")

    # Display initial list
    my_task_list.showTasks()

    # 2. Mark 1 task as done (e.g., index 1 - "Review OOP Principles")
    print("\nMarking task 2 as done...")
    my_task_list.markTaskDone(1)

    # 3. Display all tasks with updated statuses
    my_task_list.showTasks()