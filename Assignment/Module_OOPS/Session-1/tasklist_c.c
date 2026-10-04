#include <stdio.h>
#include <string.h>

char tasks[5][100];
int taskCount = 0;

int main() {
    int i;

    printf("Enter 5 tasks:\n");

    for (i = 0; i < 5; i++) {
        printf("Enter task %d: ", i + 1);
        fgets(tasks[i], 100, stdin);
        tasks[i][strcspn(tasks[i], "\n")] = '\0';
        taskCount++;
    }

    printf("\nTask List:\n");

    for (i = 0; i < taskCount; i++) {
        printf("%d. %s\n", i + 1, tasks[i]);
    }

    return 0;
}
