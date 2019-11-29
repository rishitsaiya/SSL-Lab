BEGIN{
printf("Number of devices on full capacity:\n");
count=0;
}

#Added 0 to substr function because of type casting prob
{
if(NR>1 && substr($5,0,length($5)-1)+0 == 100){ 
	printf("%s\n",$1);
	count+=1;
}
}

END{
printf("Total:	%d devices\n",count);
}