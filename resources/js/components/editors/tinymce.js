import { defu } from 'defu'

export default ({ loadComponentAssets, updateInputValue, getCsrfToken }) => ({
  tinymce: null,

  async setup (options) {
    await loadComponentAssets('tinymce')

    const { input, editor } = this.$refs

    await window.tinymce.init(defu(options, {
      target: editor,
      setup: (ed) => {
        this.tinymce = ed

        ed.on('input NodeChange', () => {
          updateInputValue(input, ed.getContent())
        })

        ed.on('init', function () {
          ed.setContent(input.value)
        })
      },

      file_picker_callback: options.upload_url
        ? function (cb, value, meta) {
          const input = document.createElement('input')
          input.setAttribute('type', 'file')

          if (meta.filetype === 'image') {
            input.setAttribute('accept', 'image/*')
          }

          if (meta.filetype === 'media') {
            input.setAttribute('accept', 'audio/*,video/*')
          }

          input.onchange = function () {
            const formData = new window.FormData()
            formData.append('file', input.files[0])

            if (options.disk) {
              formData.append('disk', options.disk)
            }

            if (meta.filetype) {
              formData.append('folder', meta.filetype)
            }

            window.fetch(options.upload_url, {
              body: formData,
              method: 'post',
              credentials: 'same-origin',
              headers: {
                Accept: 'application/json',
                'X-CSRF-TOKEN': getCsrfToken()
              }
            })
              .then(response => response.json())
              .then(response => cb(response.location))
          }
          input.click()
        }
        : null
    }))
  }
})

window.addEventListener('tallkit:asset.tinymce', () => {
  /* eslint-disable */
  window.tinymce.addI18n("pt_BR",{"Redo":"Refazer","Undo":"Desfazer","Cut":"Cortar","Copy":"Copiar","Paste":"Colar","Select all":"Selecionar tudo","New document":"Novo documento","Ok":"Ok","Cancel":"Cancelar","Visual aids":"Ajuda visual","Bold":"Negrito","Italic":"It\xe1lico","Underline":"Sublinhado","Strikethrough":"Tachado","Superscript":"Sobrescrito","Subscript":"Subscrito","Clear formatting":"Limpar formata\xe7\xe3o","Remove":"Remover","Align left":"Alinhar \xe0 esquerda","Align center":"Centralizar","Align right":"Alinhar \xe0 direita","No alignment":"Sem alinhamento","Justify":"Justificar","Bullet list":"Lista n\xe3o ordenada","Numbered list":"Lista ordenada","Decrease indent":"Diminuir recuo","Increase indent":"Aumentar recuo","Close":"Fechar","Formats":"Formatos","Your browser doesn't support direct access to the clipboard. Please use the Ctrl+X/C/V keyboard shortcuts instead.":"Seu navegador n\xe3o suporta acesso direto \xe0 \xe1rea de transfer\xeancia. Por favor use os atalhos Ctrl+X - C - V do teclado","Headings":"T\xedtulos","Heading 1":"T\xedtulo 1","Heading 2":"T\xedtulo 2","Heading 3":"T\xedtulo 3","Heading 4":"T\xedtulo 4","Heading 5":"T\xedtulo 5","Heading 6":"T\xedtulo 6","Preformatted":"Pr\xe9-formatado","Div":"Div","Pre":"Pr\xe9","Code":"C\xf3digo","Paragraph":"Par\xe1grafo","Blockquote":"Aspas","Inline":"Em linha","Blocks":"Blocos","Paste is now in plain text mode. Contents will now be pasted as plain text until you toggle this option off.":"O comando colar est\xe1 em modo de texto simples. O conte\xfado ser\xe1 colado como simples texto, at\xe9 voc\xea desligar esta op\xe7\xe3o.","Fonts":"Fontes","Font sizes":"Tamanhos de fonte","Class":"Classe","Browse for an image":"Procure uma imagem","OR":"OU","Drop an image here":"Solte uma imagem aqui","Upload":"Carregar","Uploading image":"Carregando imagem","Block":"Bloco","Align":"Alinhamento","Default":"Padr\xe3o","Circle":"C\xedrculo","Disc":"Disco","Square":"Quadrado","Lower Alpha":"Letra Min\xfasc.","Lower Greek":"Grego Min\xfasc.","Lower Roman":"Romano Min\xfasc.","Upper Alpha":"Letra Mai\xfasc.","Upper Roman":"Romano Mai\xfasc.","Anchor...":"\xc2ncora...","Anchor":"\xc2ncora","Name":"Nome","ID":"ID","ID should start with a letter, followed only by letters, numbers, dashes, dots, colons or underscores.":"O ID deveria come\xe7ar com uma letra, seguida apenas por letras, n\xfameros, tra\xe7os, v\xedrgulas ou sublinhas.","You have unsaved changes are you sure you want to navigate away?":"Voc\xea tem mudan\xe7as n\xe3o salvas. Voc\xea tem certeza que deseja sair?","Restore last draft":"Restaurar \xfaltimo rascunho","Special character...":"Caractere especial...","Special Character":"Caractere especial","Source code":"C\xf3digo fonte","Insert/Edit code sample":"Inserir/Editar c\xf3digo de exemplo","Language":"Idioma","Code sample...":"Exemplo de c\xf3digo...","Left to right":"Da esquerda para a direita","Right to left":"Da direita para a esquerda","Title":"T\xedtulo","Fullscreen":"Tela cheia","Action":"A\xe7\xe3o","Shortcut":"Atalho","Help":"Ajuda","Address":"Endere\xe7o","Focus to menubar":"Foco no menu","Focus to toolbar":"Foco na barra de ferramentas","Focus to element path":"Foco no caminho do elemento","Focus to contextual toolbar":"Foco na barra de ferramentas contextual","Insert link (if link plugin activated)":"Inserir link (se o plugin de link estiver ativado)","Save (if save plugin activated)":"Salvar (se o plugin de salvar estiver ativado)","Find (if searchreplace plugin activated)":"Procurar (se o plugin de procurar e substituir estiver ativado)","Plugins installed ({0}):":"Plugins instalados ({0}):","Premium plugins:":"Plugins premium:","Learn more...":"Saiba mais...","You are using {0}":"Voc\xea est\xe1 usando {0}","Plugins":"Plugins","Handy Shortcuts":"Atalhos \xfateis","Horizontal line":"Linha horizontal","Insert/edit image":"Inserir/Editar imagem","Alternative description":"Descri\xe7\xe3o alternativa","Accessibility":"Acessibilidade","Image is decorative":"A imagem \xe9 decorativa","Source":"Origem","Dimensions":"Dimens\xf5es","Constrain proportions":"Restringir propor\xe7\xf5es","General":"Geral","Advanced":"Avan\xe7ado","Style":"Estilo","Vertical space":"Espa\xe7o vertical","Horizontal space":"Espa\xe7o horizontal","Border":"Borda","Insert image":"Inserir imagem","Image...":"Imagem...","Image list":"Lista de imagens","Resize":"Redimensionar","Insert date/time":"Inserir data/hora","Date/time":"data/hora","Insert/edit link":"Inserir/Editar link","Text to display":"Texto a ser exibido","Url":"Url","Open link in...":"Abrir link em...","Current window":"Janela atual","None":"Nenhum","New window":"Nova janela","Open link":"Abrir link","Remove link":"Remover link","Anchors":"\xc2ncoras","Link...":"Link...","Paste or type a link":"Cole ou digite um Link","The URL you entered seems to be an email address. Do you want to add the required mailto: prefix?":"A URL que voc\xea informou parece ser um endere\xe7o de email. Deseja adicionar o prefixo mailto: necess\xe1rio?","The URL you entered seems to be an external link. Do you want to add the required http:// prefix?":"A URL que voc\xea informou parece ser um link externo. Deseja incluir o prefixo http://?","The URL you entered seems to be an external link. Do you want to add the required https:// prefix?":"A URL informada parece ser um link externo. Voc\xea quer adicionar o prefixo necess\xe1rio https:// ?","Link list":"Lista de links","Insert video":"Inserir v\xeddeo","Insert/edit video":"Inserir/editar v\xeddeo","Insert/edit media":"Inserir/editar m\xeddia","Alternative source":"Fonte alternativa","Alternative source URL":"Endere\xe7o URL alternativo","Media poster (Image URL)":"Post de m\xeddia (URL da Imagem)","Paste your embed code below:":"Insira o c\xf3digo de incorpora\xe7\xe3o abaixo:","Embed":"Incorporar","Media...":"M\xeddia...","Nonbreaking space":"Espa\xe7o n\xe3o separ\xe1vel","Page break":"Quebra de p\xe1gina","Paste as text":"Colar como texto","Preview":"Visualizar","Print":"Imprimir","Print...":"Imprimir...","Save":"Salvar","Find":"Localizar","Replace with":"Substituir por","Replace":"Substituir","Replace all":"Substituir tudo","Previous":"Anterior","Next":"Pr\xf3xima","Find and Replace":"Localizar e substituir","Find and replace...":"Encontrar e substituir...","Could not find the specified string.":"N\xe3o foi poss\xedvel encontrar o termo especificado","Match case":"Diferenciar mai\xfascula/min\xfascula","Find whole words only":"Encontrar somente palavras inteiras","Find in selection":"Localizar na sele\xe7\xe3o","Insert table":"Inserir tabela","Table properties":"Propriedades da tabela","Delete table":"Excluir tabela","Cell":"C\xe9lula","Row":"Linha","Column":"Coluna","Cell properties":"Propriedades da c\xe9lula","Merge cells":"Agrupar c\xe9lulas","Split cell":"Dividir c\xe9lula","Insert row before":"Inserir linha antes","Insert row after":"Inserir linha depois","Delete row":"Excluir linha","Row properties":"Propriedades da linha","Cut row":"Recortar linha","Cut column":"Recortar coluna","Copy row":"Copiar linha","Copy column":"Copiar coluna","Paste row before":"Colar linha antes","Paste column before":"Colar coluna antes","Paste row after":"Colar linha depois","Paste column after":"Colar coluna depois","Insert column before":"Inserir coluna antes","Insert column after":"Inserir coluna depois","Delete column":"Excluir coluna","Cols":"Colunas","Rows":"Linhas","Width":"Largura","Height":"Altura","Cell spacing":"Espa\xe7amento da c\xe9lula","Cell padding":"Espa\xe7amento interno da c\xe9lula","Row clipboard actions":"A\xe7\xf5es da \xe1rea de transfer\xeancia de linhas","Column clipboard actions":"A\xe7\xf5es da \xe1rea de transfer\xeancia de colunas","Table styles":"Estilos da tabela","Cell styles":"Estilos da c\xe9lula","Column header":"Cabe\xe7alho da coluna","Row header":"Cabe\xe7alho da linha","Table caption":"Legenda da tabela","Caption":"Legenda","Show caption":"Mostrar descri\xe7\xe3o","Left":"Esquerda","Center":"Centro","Right":"Direita","Cell type":"Tipo de c\xe9lula","Scope":"Escopo","Alignment":"Alinhamento","Horizontal align":"Alinhamento horizontal","Vertical align":"Alinhamento vertical","Top":"Superior","Middle":"Meio","Bottom":"Inferior","Header cell":"C\xe9lula cabe\xe7alho","Row group":"Agrupar linha","Column group":"Grupo de colunas","Row type":"Tipo de linha","Header":"Cabe\xe7alho","Body":"Corpo","Footer":"Rodap\xe9","Border color":"Cor da borda","Solid":"Solido","Dotted":"Pontilhado","Dashed":"Tracejado","Double":"Duplo","Groove":"Chanfrada","Ridge":"Cume","Inset":"Inserir","Outset":"In\xedcio","Hidden":"Oculto","Insert template...":"Inserir modelo...","Templates":"Modelos","Template":"Modelo","Insert Template":"Inserir modelo","Text color":"Cor do texto","Background color":"Cor do fundo","Custom...":"Personalizado...","Custom color":"Cor personalizada","No color":"Nenhuma cor","Remove color":"Remover cor","Show blocks":"Mostrar blocos","Show invisible characters":"Exibir caracteres invis\xedveis","Word count":"Contador de palavras","Count":"Contar","Document":"Documento","Selection":"Sele\xe7\xe3o","Words":"Palavras","Words: {0}":"Palavras: {0}","{0} words":"{0} palavras","File":"Arquivo","Edit":"Editar","Insert":"Inserir","View":"Visualizar","Format":"Formato","Table":"Tabela","Tools":"Ferramentas","Powered by {0}":"Distribu\xeddo por {0}","Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help":"\xc1rea Rich Text. Pressione ALT-F9 para exibir o menu, ALT-F10 para exibir a barra de ferramentas ou ALT-0 para exibir a ajuda","Image title":"T\xedtulo da imagem","Border width":"Espessura da borda","Border style":"Estilo da borda","Error":"Erro","Warn":"Aviso","Valid":"V\xe1lido","To open the popup, press Shift+Enter":"Para abrir a popup, aperte Shit+Enter","Rich Text Area":"\xc1rea de Rich Text","Rich Text Area. Press ALT-0 for help.":"\xc1rea Rich Text. Aperte ALT-0 para ajuda.","System Font":"Fonte do sistema","Failed to upload image: {0}":"Falha no upload da imagem: {0}","Failed to load plugin: {0} from url {1}":"Falha ao carregar plugin: {0} da url {1}","Failed to load plugin url: {0}":"Falha ao carregar url do plugin: {0}","Failed to initialize plugin: {0}":"Falha ao inicializar plugin: {0}","example":"exemplo","Search":"Pesquisar","All":"Tudo","Currency":"Moeda","Text":"Texto","Quotations":"Cita\xe7\xf5es","Mathematical":"Matem\xe1tico","Extended Latin":"Latino estendido","Symbols":"S\xedmbolos","Arrows":"Setas","User Defined":"Definido pelo Usu\xe1rio","dollar sign":"s\xedmbolo de d\xf3lar","currency sign":"s\xedmbolo de moeda","euro-currency sign":"s\xedmbolo de euro","colon sign":"s\xedmbolo de dois pontos","cruzeiro sign":"s\xedmbolo de cruzeiro","french franc sign":"s\xedmbolo de franco franc\xeas","lira sign":"s\xedmbolo de lira","mill sign":"s\xedmbolo do mill","naira sign":"s\xedmbolo da naira","peseta sign":"s\xedmbolo da peseta","rupee sign":"s\xedmbolo da r\xfapia","won sign":"s\xedmbolo do won","new sheqel sign":"s\xedmbolo do novo sheqel","dong sign":"s\xedmbolo do dong","kip sign":"s\xedmbolo do kip","tugrik sign":"s\xedmbolo do tugrik","drachma sign":"s\xedmbolo do drachma","german penny symbol":"s\xedmbolo de centavo alem\xe3o","peso sign":"s\xedmbolo do peso","guarani sign":"s\xedmbolo do guarani","austral sign":"s\xedmbolo do austral","hryvnia sign":"s\xedmbolo do hryvnia","cedi sign":"s\xedmbolo do cedi","livre tournois sign":"s\xedmbolo do livre tournois","spesmilo sign":"s\xedmbolo do spesmilo","tenge sign":"s\xedmbolo do tenge","indian rupee sign":"s\xedmbolo de r\xfapia indiana","turkish lira sign":"s\xedmbolo de lira turca","nordic mark sign":"s\xedmbolo do marco n\xf3rdico","manat sign":"s\xedmbolo do manat","ruble sign":"s\xedmbolo do rublo","yen character":"caractere do yen","yuan character":"caractere do yuan","yuan character, in hong kong and taiwan":"caractere do yuan, em Hong Kong e Taiwan","yen/yuan character variant one":"varia\xe7\xe3o do caractere de yen/yuan","Emojis":"Emojis","Emojis...":"Emoji...","Loading emojis...":"Carregando emojis...","Could not load emojis":"N\xe3o foi poss\xedvel carregar os emojis","People":"Pessoas","Animals and Nature":"Animais e Natureza","Food and Drink":"Comida e Bebida","Activity":"Atividade","Travel and Places":"Viagem e Lugares","Objects":"Objetos","Flags":"Bandeiras","Characters":"Caracteres","Characters (no spaces)":"Caracteres (sem espa\xe7os)","{0} characters":"{0} caracteres","Error: Form submit field collision.":"Erro: colis\xe3o de bot\xe3o de envio do formul\xe1rio.","Error: No form element found.":"Erro: elemento de formul\xe1rio n\xe3o encontrado.","Color swatch":"Amostra de cor","Color Picker":"Seletor de Cores","Invalid hex color code: {0}":"C\xf3digo de cor hexadecimal inv\xe1lido: {0}","Invalid input":"Entrada inv\xe1lida","R":"V","Red component":"Componente vermelho","G":"V","Green component":"Componente verde","B":"A","Blue component":"Componente azul","#":"#","Hex color code":"C\xf3digo de cor hexadecimal","Range 0 to 255":"Faixa de 0 a 255","Turquoise":"Turquesa","Green":"Verde","Blue":"Azul","Purple":"Roxo","Navy Blue":"Azul marinho","Dark Turquoise":"Turquesa escuro","Dark Green":"Verde escuro","Medium Blue":"Azul m\xe9dio","Medium Purple":"Roxo m\xe9dio","Midnight Blue":"Azul meia-noite","Yellow":"Amarelo","Orange":"Laranja","Red":"Vermelho","Light Gray":"Cinza claro","Gray":"Cinza","Dark Yellow":"Amarelo escuro","Dark Orange":"Laranja escuro","Dark Red":"Vermelho escuro","Medium Gray":"Cinza m\xe9dio","Dark Gray":"Cinza escuro","Light Green":"Verde claro","Light Yellow":"Amarelo claro","Light Red":"Vermelho claro","Light Purple":"Roxo claro","Light Blue":"Azul claro","Dark Purple":"Roxo escuro","Dark Blue":"Azul escuro","Black":"Preto","White":"Branco","Switch to or from fullscreen mode":"Abrir ou fechar modo de tela cheia","Open help dialog":"Abrir janela de ajuda","history":"hist\xf3rico","styles":"estilos","formatting":"formata\xe7\xe3o","alignment":"alinhamento","indentation":"indenta\xe7\xe3o","Font":"Fonte","Size":"Tamanho","More...":"Mais...","Select...":"Selecionar...","Preferences":"Prefer\xeancias","Yes":"Sim","No":"N\xe3o","Keyboard Navigation":"Navega\xe7\xe3o por Teclado","Version":"Vers\xe3o","Code view":"Ver c\xf3digo","Open popup menu for split buttons":"Abrir menu popup para bot\xf5es com divis\xe3o","List Properties":"Listar Propriedades","List properties...":"Listar propriedades...","Start list at number":"Iniciar a lista no n\xfamero","Line height":"Altura da linha","Dropped file type is not supported":"O tipo de arquivo descartado n\xe3o \xe9 compat\xedvel","Loading...":"Carregando...","ImageProxy HTTP error: Rejected request":"Erro HTTP ImageProxy: solicita\xe7\xe3o rejeitada","ImageProxy HTTP error: Could not find Image Proxy":"Erro de HTTP ImageProxy: n\xe3o foi poss\xedvel encontrar o proxy de imagem","ImageProxy HTTP error: Incorrect Image Proxy URL":"Erro de HTTP ImageProxy: URL de proxy de imagem incorreto","ImageProxy HTTP error: Unknown ImageProxy error":"Erro de HTTP ImageProxy: erro ImageProxy desconhecido"});
  /* eslint-enable */
})
