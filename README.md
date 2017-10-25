#gestor_financeiro

Simples sistema de gerenciamento financeiro em PHP utilizando a arquitetura de projeto MVC sem utilização de Framework. Sistema contendo apenas as operações de backoffice.

Instruções de Funcionamento:
No arquivo index.php contém todas as chamadas para acessar todas as funcionalidades do sistema. Neste arqivo, de acordo com o parâmetro GET['pagina'] informado, o arquivo index.php é responsável por instância a Model responsável e/ou redirecionar o página para a View.

Na página principl do sistema http://localhost/gestor_financeiro/ o usuário tem duas opções:

1: logar caso seja cadasrado;

2: cadastrar.

Após realizar o cadastro ou logar com sucesso, é exibido a página de dashboard do usuário, com um botão para o mesmo acessar as suas contas. Nesta página, é exibdo um relatório com todas as contas cadastradas para o usuário, sendo possível o usuário realizar as seguintes operações:

1: Adicionar novas contas;

2: Realizar Transações em uma determinada conta;

3: Gerar relatório por período;

4: Ativar ou Intivar uma determinada conta.

Observações:

O intuido do sistema é exemplificar como funciona a arquitetura MVC sem a utilização de framework tendo em vista somente as operações de Backoffice, sendo assim, para facilitar, foi utilizada o Bootstrap 3 (https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css) somente para algumas questões de CSS.  
