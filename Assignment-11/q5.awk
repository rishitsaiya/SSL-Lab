{
	line = $0;

	for(j=1;j<=NF;j++){
		count = gsub(/[[:alnum:]]/,"",$j)
		if(count!=0){
			line = line" "count;
		}
	}
	print line > "q5.txt";
}