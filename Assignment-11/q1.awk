FILENAME==ARGV[1]{
	for(j=1;j<=NF;j++)
		matrix1[FNR,j]= $j;
	row1=FNR;
	col1=NF;
next
}

END{
	for(i=1;i<=col1;i++){
		for(j=1;j<=row1;j++)
			printf("%d ", matrix1[j,i])
		printf("\n");
	}
}