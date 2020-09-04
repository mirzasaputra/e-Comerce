    function seribu(amount, decimalSeparator, thousandsSeparator, nDecimalDigits){  
        var num = parseFloat( amount ); //convert to float  
        //default values  
        decimalSeparator = decimalSeparator || '.';  
        thousandsSeparator = thousandsSeparator || ',';  
        nDecimalDigits = nDecimalDigits == null? 2 : nDecimalDigits;  
      
        var fixed = num.toFixed(nDecimalDigits); //limit or add decimal digits  
        //separate begin [$1], middle [$2] and decimal digits [$4]  
        var parts = new RegExp('^(-?\\d{1,3})((?:\\d{3})+)(\\.(\\d{' + nDecimalDigits + '}))?$').exec(fixed);   
      
        if(parts){ //num >= 1000 || num < = -1000  
            return parts[1] + parts[2].replace(/\d{3}/g, thousandsSeparator + '$&') + (parts[4] ? decimalSeparator + parts[4] : '');  
        }else{  
            return fixed.replace('.', decimalSeparator);  
        }  
    }  