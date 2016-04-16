program loja_de_informatica;
uses crt;

type TProduto=record
        ID:String[5];
        Nome:String[15];
        descricao,Senha:String[30];
        preco:Real;
     end;

var op:integer;
    produto:Tproduto;
    ficheiro:File of tproduto;
    senha_f:text;

/////////////////////////////// Verificar Ficheiro ////////////////////////
function ExisteFile: Boolean;
begin
    {$I-};
    reset(ficheiro);Close(ficheiro);
    {$I+};
    ExisteFile := (IOResult=0);
end;

///////////////////////////////////// Verificar Senha ///////////////////
function ExisteSenha: Boolean;
begin
    {$I-};
    reset(senha_f);Close(senha_f);
    {$I+};
    ExisteSenha := (IOResult=0);
end;


///////////////////////////////// ERRO DE LEITURA ////////////////////////
procedure error_f;
begin
       clrscr;
       writeln;
       writeln('    |=============( Erro de leitrua )===========| ');
       writeln('    |                                           | ');
       writeln('    |  (X)   O Ficheiro "Loja_Informatica.dat"  |');
       writeln('    |        não exste                          |');
       writeln('    |                                           |');
       writeln('    |__________________( OK )___________________|');
       writeln;
       writeln('          ENTER para voltar ao MENU');
       readln;
end;

///////////////////////////////// Encriptar senha /////////////////////////
function Encriptar(senha:String):string;
var Nova_Senha:String;
    i,Tamanho:Integer;
begin
    nova_senha:='';
    tamanho:=length(senha);
    for i:=1 to tamanho do
    begin
        nova_senha:=nova_senha+chr(ord(senha[i])+3);
    end;
    encriptar:=nova_senha;
end;


////////////////////////////////// Segurança de Entrada ///////////////////
procedure ENTRADA;
var senha,prova:String;
    entrar:integer;
begin
    if not ExisteSenha then
    begin
        repeat
            clrscr;
            writeln;
            writeln;
            writeln;
            writeln;
            writeln;
            writeln;
            writeln;
            write('         Defina a sua passe de acesso ao programa (NAO SE ESQUEÇA!!): ');
            readln(senha);
            if senha='' then
                writeln('A Senha não pode estar em branco');
        until senha<>'';
        senha:=encriptar(senha);
        ReWrite(senha_f);
        write(senha_f,senha);
        writeln;
        writeln;
        writeln;
        writeln;
        writeln;
        writeln;
        writeln;
    end
    else
    begin
        reset(senha_f);
        read(senha_f,prova);
        entrar:=0;
        repeat
            clrscr;
            writeln;
            writeln;
            writeln;
            writeln;
            writeln;
            writeln;
            writeln;
            write('         A Sua senha para entrar: ');
            readln(senha);
            if senha='' then
                writeln('A Senha não pode estar em branco')
            else
            begin
                senha:=encriptar(senha);
                if senha=prova then
                    entrar:=1
                else
                    writeln('Senha incorrecta!');
            end;
        until (senha<>'') and (entrar=1);
    end;
    close(senha_f);
end;

/////////////////////////////// Pesquisar por preço ////////////////////
procedure pesq_preco;
var aux:integer;
    Preco_p:real;
begin
    aux:=0;
    if not ExisteFile then
        error_f
    else
    begin
        clrscr;
        writeln('          |==============( Pesquisar por Preço )=================|');
        writeln('          |______________________________________________________|');
        write('          | Introduza o Preço menor a pesquisar:');
        readln(Preco_p);
        reset(ficheiro);
        writeln('          |______________________________________________________|');
        writeln('          |   ID     |   Nome  |     Descrição    |   Preço (€)  |');
        writeln('          |----------|---------|------------------|--------------|');
        while not eof(ficheiro) do
        begin
            read(ficheiro,produto);
            if preco_p>=produto.preco then
            begin
                aux:=1;
                writeln('          ',produto.id:10,' | ',produto.nome:7,' | ',produto.descricao:16,' | ',produto.preco:4:2,'€');
            end;
        end;
        writeln('          |======================( FIM )=========================|');
        writeln;
        if aux=0 then
        begin
            clrscr;
            writeln;
            writeln('    |=============( Registo nâo existe )========| ');
            writeln('    |                                           | ');
            writeln('    |  (X)   O Registo introduzido não existe   |');
            writeln('    |                                           |');
            writeln('    |__________________( OK )___________________|');
            writeln;
            writeln('          ENTER para voltar ao MENU');
            readln;
        end;
        writeln('Prima ENTER para continuar . . . ');
        readln;
        close(ficheiro);
    end
end;

///////////////////////////////// Pesquisar por ID /////////////////////
procedure pesq_id;
var aux:integer;
    ID_p:String;
begin
    aux:=0;
    if not ExisteFile then
        error_f
    else
    begin
    clrscr;
        writeln('          |==============( Pesquisar por ID )====================|');
        writeln('          |______________________________________________________|');
        write('          | Introduza o ID a pesquisar:');
        readln(ID_p);
        reset(ficheiro);
        writeln('          |______________________________________________________|');
        writeln('          |   ID     |   Nome  |     Descrição    |   Preço (€)  |');
        writeln('          |----------|---------|------------------|--------------|');
        while not eof(ficheiro) do
        begin
            read(ficheiro,produto);
            if ID_p=produto.id then
            begin
                aux:=1;
                writeln('          ',produto.id:10,' | ',produto.nome:7,' | ',produto.descricao:16,' | ',produto.preco:4:2,'€');
                read(ficheiro,produto);
            end;
        end;
        writeln('          |======================( FIM )=========================|');
        writeln;
        if aux=0 then
        begin
            clrscr;
            writeln;
            writeln('    |=============( Registo nâo existe )========| ');
            writeln('    |                                           | ');
            writeln('    |  (X)   O Registo introduzido não existe   |');
            writeln('    |                                           |');
            writeln('    |__________________( OK )___________________|');
            writeln;
            writeln('          ENTER para voltar ao MENU');
            readln;
        end;
        if aux<>0 then
        begin
            writeln('Prima ENTER para continuar . . . ');
            readln;
        end;
        close(ficheiro);
    end;
end;

///////////////////////////////// Ver Tudo /////////////////////////////
procedure Ver_Tudo;
begin
    if not ExisteFile then
        error_f
    else
    begin
    clrscr;
        reset(ficheiro);
        writeln;
        writeln('          |==============( Ver todos os registos )===============|');
        writeln('          |______________________________________________________|');
        writeln('          |   ID     |   Nome  |     Descrição    |   Preço (€)  |');
        writeln('          |----------|---------|------------------|--------------|');
        while not eof(ficheiro) do
        begin
            read(ficheiro,produto);
            writeln('          ',produto.id:10,' | ',produto.nome:7,' | ',produto.descricao:16,' | ',produto.preco:4:2,'€');
        end;
        writeln('          |======================( FIM )=========================|');
        writeln;
        //close(ficheiro);
        writeln('       Pressione ENTER para continuar . . .');
        readln;
    end;
end;

/////////////////////////////////// Alterar /////////////////////////////
procedure Alterar;
var n,opa,x:integer;
begin
     if not ExisteFile then
        error_f
     else
     begin
        clrscr;
        reset(ficheiro);
          writeln;
          writeln('          |==============( Alterar dados )=======================|');
          writeln('          |                                                      |');
          n:=filesize(ficheiro);
          Ver_Tudo;
          writeln('          | nº de produtos no ficheiro: ', n);
          repeat
                writeln('          | Nº do registo  a alterar entre 1 e ', n);
                write('          | Alterar o Registo >');
                readln(x);
                if (x<1) or (x>n) then
                begin
                clrscr;
                    writeln;
                    writeln('          |=============( Valor Invalido )============| ');
                    writeln('          |                                           | ');
                    writeln('          |  (!)   O Registo inserido não esta no  "  |');
                    writeln('          |        intervalo de 1 a ',n,'                 |');
                    writeln('          |                                           |');
                    writeln('          |___________________________________________|');
                    writeln;
                    write('          Outro Valor >');
                    readln;
                end;
          until(x>0) and (x<=n);
          seek (ficheiro, x-1);
          read(ficheiro,produto);
          repeat
            writeln;
            writeln('   [ 1-ID | 2-Nome | 3-Descrição | 4-Preço | 5-Todos | 0-Cancelar ]');
            readln(opa);
            if (opa<0) or (opa>5) then
                writeln('< ! Opção invalida! >')
          until (opa>=0) and (opa<=5);
          case opa of
            1:begin
                write('          Novo ID:');
                readln(produto.id);
            end;
            2:begin
                write('          Novo Nome:');
                readln(produto.nome);
            end;
            3:begin
                write('          Novo Descrição:');
                readln(produto.descricao);
            end;
            4:begin
                write('          Novo Preço:');
                readln(produto.preco);
            end;
            5:begin
                write('          Novo ID:');
                readln(produto.id);
                write('          Novo Nome:');
                readln(produto.nome);
                write('          Novo Descrição:');
                readln(produto.descricao);
                write('          Novo Preço:');
                readln(produto.preco);
            end;
            end;
            if (opa<>0) then
            begin
                seek(ficheiro,x-1);
                write(ficheiro,produto);
            end;
            close(ficheiro);
     end;
end;


//////////////////////////////// Introduzir/Adicionar /////////////////
procedure Introduzir;
var n_registos,i,n:integer;
begin
    if ExisteFile then
    begin
        reset(ficheiro);
        n:=filesize(ficheiro);
        seek(ficheiro,n);
    end
    else
        ReWrite(ficheiro);
        clrscr;
    writeln;
    writeln('     (============( Adicionar/Alterar Registos )============)');
    writeln('     |                                                      |');
    writeln('     |     (!)   Quantos Registos pertende inserir?         |');
    writeln('     |______________________________________________________|');
    writeln;
    write('     >');
    readln(n_registos);
    writeln;
    writeln('          ==============( Adicionar/Alterar Registos )==========');
    for i:=1 to n_registos do
    begin
        write('          ID: ');
        readln(produto.ID);
        write('          Nome: ');
        readln(produto.nome);
        write('          Descrição: ');
        readln(produto.descricao);
        write('          Preço: ');
        readln(produto.preco);
        writeln;
        write(ficheiro,produto);
    end;
    writeln(          '==========================( FIM )====================');
    writeln;
    close(ficheiro);
end;

//////////////////////////////// MENU ////////////////////////////////
procedure menu;
begin
    writeln;
    writeln;
    WRiteln;
    writeln;
    writeln('          |======================( MENU PRINCIPAL )=============|');
    writeln('          |                                                     |');
    writeln('          |     1..............Introduzir/Adicionar Produtos    |');
    writeln('          |     2...............Visualizar todos os Produtos    |');
    writeln('          |     3.........................Alterar Produto(s)    |');
    writeln('          |     4..........................Pesquisar por ID     |');
    writeln('          |     5.................Pesquisar por Preço menor     |');
    writeln('          |                                                     |');
    writeln('          |                           0......Sair               |');
    writeln('          |_____________________________________________________|');
    writeln;
    write('          OPÇÂO =>');
end;



// Programa Principal
begin
    assign(ficheiro,'Loja_Informatica.dat');
    assign(senha_f,'senha.dat');
    ENTRADA;
    clrscr;
    writeln('     |BEM VINDO|==========|Linguagem de Programação|========|"A.A."|    ');
    writeln;

    repeat
        menu;
        readln(op);
        case op of
            1:Introduzir;
            2:Ver_Tudo;
            3:Alterar;
            4:pesq_id;
            5:pesq_preco;
        end;
    clrscr;
    until op=0;
end.

