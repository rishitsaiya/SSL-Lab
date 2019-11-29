BEGIN{
printf("File System|Available Storage|Used|Percentage\n");
}

#Added 0 to substr function because of type casting prob
{
if(NR>1 && substr($5,0,length($5)-1)+0 > 30){
	printf("%s|%d|%d|%s\n",$1,$2,$3,$5);
}
}