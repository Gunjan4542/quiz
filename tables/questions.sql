-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2016 at 11:28 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `op1` text NOT NULL,
  `op2` text NOT NULL,
  `op3` text NOT NULL,
  `op4` text NOT NULL,
  `correct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `op1`, `op2`, `op3`, `op4`, `correct`) VALUES
(5, 'What&nbsp;is&nbsp;the&nbsp;best&nbsp;way&nbsp;to&nbsp;learn????', 'Mugging', 'Reading', 'UnderstandingÂ Concept', 'Practicing', 3),
(7, 'What&nbsp;is&nbsp;the&nbsp;output&nbsp;of&nbsp;the&nbsp;following&nbsp;program?<br />\n#include&nbsp;&lt;stdio.h&gt;<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;hello&nbsp;world!&quot;);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', 'helloÂ World', 'HelloÂ world', 'helloÂ world', 'helloÂ world!', 4),
(9, 'What&nbsp;is&nbsp;the&nbsp;output&nbsp;of&nbsp;the&nbsp;following&nbsp;program?<br />\n#include&nbsp;&lt;stdio.h&gt;<br />\nint&nbsp;i;<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d&quot;,i++);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d&quot;,++i);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', '12', '02', 'GarbageÂ Value', '23', 2),
(10, 'Which&nbsp;is&nbsp;most&nbsp;efficient&nbsp;interms&nbsp;of&nbsp;memory&nbsp;?', 'stack', 'enum', 'struct', 'union', 4),
(12, 'Which&nbsp;one&nbsp;of&nbsp;the&nbsp;follwing&nbsp;is&nbsp;true?', 'functionÂ canÂ callÂ itself', 'functionÂ canÂ notÂ callÂ itself', 'functionÂ canÂ notÂ beÂ reused', 'functionÂ isÂ memoryÂ efficient', 1),
(45, 'what&nbsp;is&nbsp;the&nbsp;output&nbsp;of&nbsp;the&nbsp;program&nbsp;?<br />\n#include&nbsp;&lt;stdio.h&gt;<br />\n#define&nbsp;MULT(a,b)&nbsp;a*b;<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d&quot;,MULT(10+10)&nbsp;);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;108;<br />\n}&nbsp;', '200', '220', '120', '300', 3),
(46, 'What&nbsp;is&nbsp;the&nbsp;output&nbsp;of&nbsp;the&nbsp;following&nbsp;program&nbsp;?<br />\n#include&nbsp;&lt;stdio.h&gt;<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d&quot;,printf(&quot;&quot;));<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', '<span>0</span>', '1', '2', '8', 2),
(86, 'What&nbsp;is&nbsp;the&nbsp;output&nbsp;of&nbsp;the&nbsp;following&nbsp;program&nbsp;if&nbsp;compiled&nbsp;in&nbsp;gcc&nbsp;compiler?<br />\n#include&nbsp;&lt;stdio.h&gt;<br />\nvoid&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;char&nbsp;*str=&quot;helloRCC&quot;;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%s&quot;,str);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', 'addressÂ ofÂ str', 'helloRCC', 'h', 'CompilationÂ Error', 2),
(87, 'what&nbsp;is&nbsp;the&nbsp;output&nbsp;of&nbsp;the&nbsp;following&nbsp;program?<br />\n#include&nbsp;&lt;stdio.h&gt;<br />\nint&nbsp;recursion(int&nbsp;n)<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;if(n&lt;2)&nbsp;return&nbsp;n;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;recursion(n-1)+2;<br />\n}<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d&quot;,recursion(3)&nbsp;);<br />\n}', '3', '<span>0</span>', '5', '6', 3),
(97, 'Which&nbsp;one&nbsp;of&nbsp;the&nbsp;following&nbsp;is&nbsp;not&nbsp;an&nbsp;object&nbsp;oriented&nbsp;programming&nbsp;language?', 'C++', 'JAVA', 'Python', 'C', 4),
(98, 'variables&nbsp;or&nbsp;objects&nbsp;inside&nbsp;class&nbsp;are&nbsp;called&nbsp;?', 'Instances', 'Parameters', 'Attributes', 'Fragment', 3),
(99, '1.What&nbsp;will&nbsp;be&nbsp;the&nbsp;output&nbsp;of&nbsp;the&nbsp;program?<br />\n#include&lt;stdio.h&gt;<br />\n#include&lt;stdlib.h&gt;<br />\n<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;int&nbsp;*p;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;p&nbsp;=&nbsp;(int&nbsp;*)malloc(20);&nbsp;/*&nbsp;Assume&nbsp;p&nbsp;has&nbsp;address&nbsp;of&nbsp;1314&nbsp;*/<br />\n&nbsp;&nbsp;&nbsp;&nbsp;free(p);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%u&quot;,&nbsp;p);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', '1314', 'GarbageÂ Value', '1316', 'RandomÂ Address', 1),
(100, 'What&nbsp;will&nbsp;be&nbsp;the&nbsp;output&nbsp;of&nbsp;the&nbsp;program?<br />\n#include&lt;stdio.h&gt;<br />\n#include&lt;string.h&gt;<br />\n<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;char&nbsp;*s;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;char&nbsp;*fun();<br />\n&nbsp;&nbsp;&nbsp;&nbsp;s&nbsp;=&nbsp;fun();<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%s\\n&quot;,&nbsp;s);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}<br />\nchar&nbsp;*fun()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;char&nbsp;buffer[30];<br />\n&nbsp;&nbsp;&nbsp;&nbsp;strcpy(buffer,&nbsp;&quot;RAM&quot;);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;(buffer);<br />\n}', '0xffff', 'GarbageÂ Value', 'RAM', 'Error', 2),
(101, 'How&nbsp;many&nbsp;bytes&nbsp;of&nbsp;memory&nbsp;will&nbsp;the&nbsp;following&nbsp;code&nbsp;reserve&nbsp;in&nbsp;a&nbsp;16&nbsp;bit&nbsp;architecture&nbsp;platform?<br />\n#include&lt;stdio.h&gt;<br />\n#include&lt;stdlib.h&gt;<br />\n<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;int&nbsp;*p;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;p&nbsp;=&nbsp;(int&nbsp;*)malloc(256&nbsp;*&nbsp;256);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;if(p&nbsp;==&nbsp;NULL)<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;Allocation&nbsp;failed&quot;);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', '65536', 'AllocationÂ Failed', 'Error', 'NoÂ output', 2),
(102, '	<br />\nIn&nbsp;which&nbsp;stage&nbsp;the&nbsp;following&nbsp;code&nbsp;<br />\n#include&lt;stdio.h&gt;&nbsp;<br />\ngets&nbsp;replaced&nbsp;by&nbsp;the&nbsp;contents&nbsp;of&nbsp;the&nbsp;file&nbsp;stdio.h?', 'DuringÂ Editing', 'DuringÂ Runtime', 'DuringÂ Preprocessing', 'DuringÂ Linking', 3),
(103, '#include&lt;stdio.h&gt;<br />\n#define&nbsp;MAN(x,&nbsp;y)&nbsp;((x)&gt;(y))&nbsp;?&nbsp;(x):(y);<br />\n<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;int&nbsp;i=10,&nbsp;j=5,&nbsp;k=0;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;k&nbsp;=&nbsp;MAN(++i,&nbsp;j++);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d,&nbsp;%d,&nbsp;%d\\n&quot;,&nbsp;i,&nbsp;j,&nbsp;k);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', '11,Â 5,Â Garbage', '12,Â 6,Â Garbage', '12,Â 6,Â 12', '11,Â 5,Â 11', 3),
(104, '#include&lt;stdio.h&gt;<br />\n#define&nbsp;CUBE(x)&nbsp;(x*x*x)<br />\n<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;int&nbsp;a,&nbsp;b=3;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;a&nbsp;=&nbsp;CUBE(b++);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d,&nbsp;%d\\n&quot;,&nbsp;a,&nbsp;b);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', '9,Â 4', '27,Â 4', '60,Â 6', '27,6', 3),
(105, '#include&lt;stdio.h&gt;<br />\n#define&nbsp;MIN(x,&nbsp;y)&nbsp;(x&lt;y)?&nbsp;x&nbsp;:&nbsp;y;<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;int&nbsp;x=3,&nbsp;y=4,&nbsp;z;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;z&nbsp;=&nbsp;MIN(x+y/2,&nbsp;y-1);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;if(z&nbsp;&gt;&nbsp;0)<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d\\n&quot;,&nbsp;z);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', '<span>0</span>', '2', '3', '4', 3),
(106, '#include&lt;stdio.h&gt;<br />\n#define&nbsp;str(x)&nbsp;#x<br />\n#define&nbsp;Xstr(x)&nbsp;str(x)<br />\n#define&nbsp;oper&nbsp;multiply<br />\n<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;char&nbsp;*opername&nbsp;=&nbsp;Xstr(oper);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%s\\n&quot;,&nbsp;opername);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', 'Error:Â inÂ macroÂ substitution', 'Error:Â invalidÂ referenceÂ ''x''Â inÂ macro', 'multiply', 'Null', 3),
(107, 'What&nbsp;is&nbsp;the&nbsp;output&nbsp;of&nbsp;the&nbsp;following&nbsp;program?<br />\n#include&nbsp;&lt;stdio.h&gt;<br />\nint&nbsp;r2(int&nbsp;n)<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;if(n&lt;=1)&nbsp;return&nbsp;0;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;r2(n-1);<br />\n}<br />\nint&nbsp;r1(int&nbsp;n)<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;if(n&lt;2)&nbsp;return&nbsp;n;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;r1(n-1)+r2(n-1)+2;<br />\n}<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d&quot;,r1(5));<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}<br />\n', '5', '8', '9', '10', 3),
(108, 'Which&nbsp;bitwise&nbsp;operator&nbsp;is&nbsp;suitable&nbsp;for&nbsp;turning&nbsp;on&nbsp;a&nbsp;particular&nbsp;bit&nbsp;in&nbsp;a&nbsp;number?', '&', '|', '!', '^', 2),
(109, 'What&nbsp;is&nbsp;the&nbsp;output&nbsp;of&nbsp;the&nbsp;following&nbsp;program?<br />\n#include&lt;stdio.h&gt;<br />\n<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%x\\n&quot;,&nbsp;-1&gt;&gt;1);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', 'ffff', '0fff', 'fff0', '0000', 1),
(110, '#include&lt;stdio.h&gt;<br />\n<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;unsigned&nbsp;char&nbsp;i&nbsp;=&nbsp;0x80;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d\\n&quot;,&nbsp;i&lt;&lt;1);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', '<span>0</span>', '256', '100', '80', 2),
(111, '#include&lt;stdio.h&gt;<br />\n<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;unsigned&nbsp;int&nbsp;res;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;res&nbsp;=&nbsp;(64&nbsp;&gt;&gt;(2+1-2))&nbsp;&amp;&nbsp;(~(1&lt;&lt;2));<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d\\n&quot;,&nbsp;res);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', '32', '64', '128', '256', 1),
(112, '#include&lt;stdio.h&gt;<br />\n<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;int&nbsp;i=4,&nbsp;j=8;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d,&nbsp;%d,&nbsp;%d\\n&quot;,&nbsp;i|j&amp;j|i,&nbsp;i|j&amp;&amp;j|i,&nbsp;i^j);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}<br />\n', '4,Â 8,Â 0', '12,Â 1,Â 12', '1,Â 2,Â 1', '0,Â 0,Â 0', 2),
(113, '#include&lt;stdio.h&gt;<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;int&nbsp;x;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;for(x=-1;&nbsp;x&lt;=10;&nbsp;x++)<br />\n&nbsp;&nbsp;&nbsp;&nbsp;{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(x&nbsp;&lt;&nbsp;5)<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;continue;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;else<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;break;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;IndiaBIX&quot;);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;}<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', '11Â times', '0Â times', '5Â times', 'infiniteÂ times', 2),
(114, 'According&nbsp;to&nbsp;ANSI&nbsp;specifications&nbsp;which&nbsp;is&nbsp;the&nbsp;correct&nbsp;way&nbsp;of&nbsp;declaring&nbsp;main&nbsp;when&nbsp;it&nbsp;receives&nbsp;command-line&nbsp;arguments?', 'intÂ main(intÂ argc,Â charÂ *argv[])', 'intÂ main(argc,Â argv)<br />\nintÂ argc;Â charÂ *argv;', 'intÂ main()<br />\n{<br />\nÂ Â Â Â intÂ argc;Â charÂ *argv;<br />\n}', 'NoneÂ ofÂ above', 1),
(115, 'What&nbsp;do&nbsp;the&nbsp;''c''&nbsp;and&nbsp;''v''&nbsp;in&nbsp;argc&nbsp;and&nbsp;argv&nbsp;stands&nbsp;for?', '''c''Â meansÂ argumentÂ controlÂ ''v''Â meansÂ argumentÂ vector', '''c''Â meansÂ argumentÂ countÂ ''v''Â meansÂ argumentÂ vertex', '''c''Â meansÂ argumentÂ countÂ ''v''Â meansÂ argumentÂ vector', '''c''Â meansÂ argumentÂ configurationÂ ''v''Â meansÂ argumentÂ visibility', 3),
(116, 'int&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;int&nbsp;a[5]&nbsp;=&nbsp;{5,&nbsp;1,&nbsp;15,&nbsp;20,&nbsp;25};<br />\n&nbsp;&nbsp;&nbsp;&nbsp;int&nbsp;i,&nbsp;j,&nbsp;m;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;i&nbsp;=&nbsp;++a[1];<br />\n&nbsp;&nbsp;&nbsp;&nbsp;j&nbsp;=&nbsp;a[1]++;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;m&nbsp;=&nbsp;a[i++];<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d,&nbsp;%d,&nbsp;%d&quot;,&nbsp;i,&nbsp;j,&nbsp;m);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', '2,&nbsp;1,&nbsp;15', '1,&nbsp;2,&nbsp;5', '3,&nbsp;2,&nbsp;15', '2,&nbsp;3,&nbsp;20', 3),
(117, 'Consider&nbsp;the&nbsp;following&nbsp;program&nbsp;&quot;program.c&quot;&nbsp;which&nbsp;contains&nbsp;:&nbsp;-<br />\n#include&nbsp;&lt;stdio.h&gt;<br />\nint&nbsp;main(int&nbsp;argc,&nbsp;char&nbsp;*argv[])<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%s,%s,%s&quot;,argv[0],argv[1],argv[2]);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}<br />\nNow&nbsp;if&nbsp;the&nbsp;program&nbsp;is&nbsp;executed&nbsp;from&nbsp;command&nbsp;line&nbsp;by&nbsp;following&nbsp;command&nbsp;<br />\n&quot;program&nbsp;first&nbsp;second&nbsp;third&quot;&nbsp;<br />\nthen&nbsp;what&nbsp;should&nbsp;be&nbsp;the&nbsp;output&nbsp;?<br />\n', 'No&nbsp;Output', 'first&nbsp;second&nbsp;third', 'first', 'program.exe&nbsp;first&nbsp;second&nbsp;third', 4),
(118, 'Guess&nbsp;the&nbsp;output&nbsp;of&nbsp;the&nbsp;following&nbsp;program?<br />\n#include&lt;stdio.h&gt;<br />\n<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;static&nbsp;int&nbsp;a[2][2]&nbsp;=&nbsp;{1,&nbsp;2,&nbsp;3,&nbsp;4};<br />\n&nbsp;&nbsp;&nbsp;&nbsp;int&nbsp;i,&nbsp;j;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;static&nbsp;int&nbsp;*p[]&nbsp;=&nbsp;{(int*)a,&nbsp;(int*)a+1,&nbsp;(int*)a+2};<br />\n&nbsp;&nbsp;&nbsp;&nbsp;for(i=0;&nbsp;i&lt;2;&nbsp;i++)<br />\n&nbsp;&nbsp;&nbsp;&nbsp;{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for(j=0;&nbsp;j&lt;2;&nbsp;j++)<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d,&nbsp;%d,&nbsp;%d,&nbsp;%d\\n&quot;,&nbsp;*(*(p+i)+j),&nbsp;*(*(j+p)+i),&nbsp;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*(*(i+p)+j),&nbsp;*(*(p+j)+i));<br />\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />\n&nbsp;&nbsp;&nbsp;&nbsp;}<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', '1,&nbsp;1,&nbsp;1,&nbsp;1<br />\n2,&nbsp;3,&nbsp;2,&nbsp;3<br />\n3,&nbsp;2,&nbsp;3,&nbsp;2<br />\n4,&nbsp;4,&nbsp;4,&nbsp;4', '1,&nbsp;2,&nbsp;1,&nbsp;2<br />\n2,&nbsp;3,&nbsp;2,&nbsp;3<br />\n3,&nbsp;4,&nbsp;3,&nbsp;4<br />\n4,&nbsp;2,&nbsp;4,&nbsp;2', '1,&nbsp;1,&nbsp;1,&nbsp;1<br />\n2,&nbsp;2,&nbsp;2,&nbsp;2<br />\n2,&nbsp;2,&nbsp;2,&nbsp;2<br />\n3,&nbsp;3,&nbsp;3,&nbsp;3', '1,&nbsp;2,&nbsp;3,&nbsp;4<br />\n2,&nbsp;3,&nbsp;4,&nbsp;1<br />\n3,&nbsp;4,&nbsp;1,&nbsp;2<br />\n4,&nbsp;1,&nbsp;2,&nbsp;3<br />\n', 3),
(119, 'What&nbsp;will&nbsp;happen&nbsp;if&nbsp;the&nbsp;following&nbsp;program&nbsp;is&nbsp;compiled&nbsp;in&nbsp;gcc&nbsp;compiler&nbsp;?<br />\n#include&nbsp;&lt;stdio.h&gt;<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;int&nbsp;arr[]={0,1,2,3};<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d&quot;,arr[6]);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}', 'Compilation&nbsp;error&nbsp;:&nbsp;Array&nbsp;index&nbsp;out&nbsp;of&nbsp;bound', 'No&nbsp;Compilation&nbsp;Error', 'Compilation&nbsp;Error&nbsp;:&nbsp;Out&nbsp;of&nbsp;Range', 'Compilation&nbsp;Error&nbsp;:&nbsp;Lvalue&nbsp;required&nbsp;', 2),
(121, 'What&nbsp;is&nbsp;the&nbsp;output&nbsp;of&nbsp;the&nbsp;following&nbsp;program?<br />\n#include&nbsp;&lt;stdio.h&gt;<br />\nvoid&nbsp;func(int&nbsp;a,int&nbsp;b)<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;a=a+2;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;b=a++;<br />\n}<br />\nint&nbsp;main()<br />\n{<br />\n&nbsp;&nbsp;&nbsp;&nbsp;int&nbsp;a=12,b=13;<br />\n&nbsp;&nbsp;&nbsp;&nbsp;func(a,b);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;%d&nbsp;%d&quot;,a,b);<br />\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;<br />\n}<br />\n', '14,14', '14,15', '12,14', '12,13', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
