class Task:
    def __init__(self, title: str):
        self.title = title
        self.isDone = False

    def markDone(self):
        self.isDone = True

    def display(self):
        status = "[DONE]" if self.isDone else "[PENDING]"
        print(f"Task: {self.title} | Status: {status}")