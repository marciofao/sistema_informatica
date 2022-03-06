	window.onload = function() {
	    var input = document.getElementById('usuario').focus();
	}


	function getMessage() {
	    // create array of murphy laws
	    var ar = new Array(20)
	    ar[0] = "Nada é tão fácil quanto parece."
	    ar[1] = "Tudo que acontece na nossa vida é essencial. Até os erros trazem a possibilidade do aprendizado."
	    ar[2] = "A vida é infinita para aqueles que sabem aproveitá-la!"
	    ar[3] = "Da vida não quero muito. Quero apenas saber que tentei tudo o que quis, tive tudo o que pude, amei tudo o que valia e perdi apenas o que, no fundo, nunca foi meu.."
	    ar[4] = "O tempo deixa perguntas, mostra respostas, esclarece dúvidas, mas, acima de tudo, o tempo traz verdades."
	    ar[5] = "Nunca troque o que você mais quer na vida pelo que você mais quer no momento, pois os momentos passam e a vida continua."
	    ar[6] = "Cuidado com as voltas que o mundo dá. Hoje você lança as palavras, amanhã sente o efeito delas."
	    ar[7] = "Há muita coisa na vida que não controlo, mas pelo menos sou livre para sorrir, sonhar e amar quando quiser."
	    ar[8] = "Quem é verdadeiro vai estar do seu lado, Até mesmo quando você menos merecer."
	    ar[9] = "Não é vingança. É a Lei de Newton: Para toda ação existe uma reação."
	    ar[10] = "Deixe que a fé leve você até onde quer chegar."
	    ar[11] = "A vida é um eco. Se você não está gostando do que está recebendo, observe o que está emitindo."
	    ar[12] = "Às vezes podemos não saber para que lado avançar, mas não podemos nunca parar."
	    ar[13] = "Só por hoje não vou me preocupar com o que pode dar errado, apenas com o que pode dar certo!"
	    ar[14] = "Lembrar é fácil para quem tem memória, esquecer é difícil para quem tem coração."
	    ar[15] = "O tempo leva muitas coisas, mas nunca poderá apagar nossas melhores recordações."
	    ar[16] = "Tu te tornas eternamente responsável pelo que cativas."
	    ar[17] = "E quando não tiver motivos para sorrir, eu invento!"
	    ar[18] = "Se é o caminho certo merece ser percorrido, não importa se é curto, longo ou difícil demais!"
	    ar[19] = "Não espero que meu caminho pela vida seja fácil, apenas que o destino final valha a pena."

	    var now = new Date()
	    var sec = now.getSeconds()
	        //document.random.random.value="Murphy's Law: " + ar[sec % 20]
	    alert(ar[sec % 20]);
	}