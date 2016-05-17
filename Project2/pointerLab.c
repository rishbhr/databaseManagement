#include <stdio.h>
/* difference between *pa and pa: pa is the integer variable, and can only store the value
 * *pa is a pointer variable, can only store address of the assigned variable
 */
int main() {
	//init variables
	int a;
	int b;

	//pointer variables
	int *pa;
	int *pb;
	int *pc;

	a = 12;
	b = 9;

	//assign pointers with a
	pa = &a;
	pb = pa;
	pc = pa;

	//print the values pointing to a
	printf("&a assigned PA\n");
	printf("PA: %d, PB: %d, PC: %d\n", *pa, *pb, *pc);
	
	//print the values pointing to b
	pa = &b;
	printf("&b assigned to PA\n");
	printf("PA: %d, PB: %d, PC: %d\n", *pa, *pb, *pc);

	//print out the addresses
	printf("address values: \n");
	printf("PA: %p, PB: %p, PC: %p\n", pa, pb, pc);

	//print out value, address and the size of a
	printf("\n");
	printf("Value of A: %d\n", a);
	printf("Address of A: %p\n", &a);
	printf("Size of A: %lu Bytes\n", sizeof(a));
}
