const required = ['STUDENT_NAME', 'CLASSROOM'];

const absent = required.filter((nome)=>!process.env[name]?.trim());

if (absent.length){
	console.error(`Configure: ${absents.join(',')}`)
	process.exitCode = 3;
} 
else {
	console.log({student: process.env.NOME_ALUNO, tumra:process.env.CLASSROOM})
}
