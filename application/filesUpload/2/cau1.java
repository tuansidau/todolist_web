/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author nngiabao
 */
public class cau1 {
    static String a(String banma,String banro){
        String kq="";
        int x;
        for(int i=0;i<banma.length();i++){
            if((x=((banro.charAt(i)-'A')-(banma.charAt(i)-'A')))<0) x+=26;
            if(kq.length() > 1)
                if(kq.charAt(0) == ((char)(x+'A'))) break;
            kq+=(char)(x+'A');
        }
        return kq;
    }
    
    public static void main(String[] args) {
        System.out.println(a("JAVATPOINT","KENTUTGBOX"));
    }
}
