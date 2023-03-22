
const phone =  ['12','24','44','55','05']
const ORDRE = [4,2,0,3,1]
document.querySelector("#tel").innerHTML = `${phone[ORDRE[0]]}-${phone[ORDRE[1]]}-${phone[ORDRE[2]]}-${phone[ORDRE[3]]}-${phone[ORDRE[4]]}`;