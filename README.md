# Tracked Button

**Requires PHP:** 5.6
**Stable tag:** 0.0.1
**License:** GPLv2 or later
**License URI:** [GPL-2.0](https://www.gnu.org/licenses/gpl-2.0.html)

## Descrição

O Tracked Button é um plugin WordPress projetado para mapeamento e registro de cliques em botões. Este plugin implementa um shortcode responsável por detectar e gravar informações de data e hora ao usar botões em todo o site. Essa funcionalidade permite a análise de métricas, fornecendo insights sobre conversões em produtos, índices de interesse em posts, etc.

**Notas:**
- Quando o plugin é ativado, a tabela de registros de cliques é criada automaticamente no banco de dados.
- Ao ser desativado, a tabela de registros é excluída, e todos os dados anteriormente registrados são PERDIDOS.
## Utilização do Botão Rastreável

Para incorporar o botão rastreável disponibilizado por este plugin em uma página ou post do WordPress, siga os passos abaixo:

1. Pressione "/" em qualquer editor de página ou post para acessar a funcionalidade de adição de blocos ou shortcodes.

2. Selecione a opção de adicionar um shortcode.

3. Insira o seguinte código shortcode:

   ```plaintext
   [tracked_button id=exemplo onclick=funcaojs] Texto do Botão [/tracked_button]

Atributo "id": O atributo "id" é opcional e pode ser usado para identificar o botão. Este valor fica registrado juntamente com a data e hora do clique na tabela do banco de dados.

Atributo "onclick": O atributo "onclick" é opcional e pode ser utilizado para executar funções JavaScript específicas no clique do botão, se necessário.

Atualize ou publique a página/post para visualizar o botão rastreável na página.
Lembre-se de que este shortcode cria um botão rastreável, permitindo o registro da data e hora do clique. Personalize o shortcode conforme necessário, incluindo ou excluindo atributos conforme suas preferências.


## Instalação

### 1. Enviar ZIP para o WordPress:

- Abra o painel de administração do WordPress.
- Vá para "Plugins" > "Adicionar Novo".
- Clique em "Carregar plugin" no topo da página.
- Selecione o arquivo ZIP que você baixou do GitHub.
- Clique em "Instalar Agora" e, em seguida, "Ativar Plugin" após a conclusão da instalação.

### 2. Repositório GitHub:

- Acesse [GitHub - Tracked Button](https://github.com/andrevigarani/TrackedButton).
- Clique no botão "Code" e selecione "Download ZIP".
- Extraia o arquivo ZIP baixado para obter o código do plugin.
- Cole a pasta extraída no diretório `wp-content/plugins` do seu projeto WordPress.
