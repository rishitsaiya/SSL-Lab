FILENAME==ARGV[1]{
	for(j=1;j<=NF;j++)
		matrix1[FNR,j]= $j;
	row1=FNR;
	col1=NF;
next
}

FILENAME==ARGV[2]{
	for(j=1;j<=NF;j++)
		matrix2[FNR,j]= $j;
	row2=FNR;
	col2=NF;
next
}

END{
	if(col1 != row2){
	printf("Matrix Multiplication not possible because %d != %d.\n", col1,row2) > "matrix3"
	exit;
	}
	if(col1==0 || row2==0){
		printf("Matrix Multiplication not possible because one of the rows or columns are 0.\n") > "matrix3"
	exit;	
	}
	else{
		for(i=1;i<=row1;i++){
			for(j=1;j<=col2;j++){
				for(k=1;k<=col1;k++)
					matrix3[i,j] = matrix3[i,j] + matrix1[i,k]*matrix2[k,j]
			}
		}			
	}
	
	for(i=1;i<=row1;i++){
		for(j=1;j<=col2;j++)
			printf("%d\t", matrix3[i,j]) > "matrix3"
		printf("\n") > "matrix3";
	}	
}