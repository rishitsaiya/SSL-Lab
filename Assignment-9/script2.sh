sed = $1 | sed 'N; s/^/     /; s/ *\(.\{1,\}\)\n/(\1)    /' > output.txt
