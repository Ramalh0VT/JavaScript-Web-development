const [, ,name, classroom ] = process.argv

if (!name || !classroom) {
	console.error('Use: node arguments.js <name> <class>');
	process.exitCode = 42
}

else {
	console.log({name, classroom})
}
