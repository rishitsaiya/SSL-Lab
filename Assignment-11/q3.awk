BEGIN{
	roman_arr = "I,II,III,IV,V,VI,VII,VIII,IX,X"
	split(roman_arr,arr,",");
	printf("Enter a number :     OR      Press 'q' to quit\n");
}

{
	temp=$1;
	if(temp > 0 && temp <= 10){
		printf(arr[temp]);
		printf("\n");
		arr[temp]="Given previously";
		printf("Enter a number :     OR      Press 'q' to quit\n");
	}
	else if (temp == "q")
		exit;
	else{
		printf("Enter a valid number in between 1 & 10\n");
		printf("Enter a number :     OR      Press 'q' to quit\n");
		}
}