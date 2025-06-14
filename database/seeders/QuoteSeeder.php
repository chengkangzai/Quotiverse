<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Quote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class QuoteSeeder extends Seeder
{
    public function run()
    {
        $author = $this->createAuthor();
        $quote = [
            '心存善念，盡力而為 Be good at heart, and do your best',
            '對的事情做，不對的事情不要做 Do the right thing, do things right ',
            '不要政黨利益超過國家利益，不要短期利益超越長期利益，不要少數人利益犧牲多數人權益。',
            '最困難的不是面對挫折打擊，最困難的是面對各種挫折打擊，卻沒有失去對人世的熱情',
            '成功只有三個條件: 天分、努力、運氣。天分是與生俱來、運氣不是可以控制的，可以控制的只有一樣努力。 ',
            '一個計畫若能避免別人已犯過的錯誤，往往就成功一半了。 ',
            '「失敗是常態，成功是例外」，從生物演化的角度來看，大多數的突變是不利的，甚至會致命。 ',
            '『不要羨慕別人成功，因為你沒有那麼認真。』 ',
            '生氣的時候不要做結論，生氣的時候不要下命令；還有，不要那麼容易生氣! ',
            '「失敗是常態，成功是例外」，從生物演化的角度來看，大多數的突變是不利的，甚至會致命。 ',
            '優勢者往往沒有創新的動機，因為怕改變後反而變差。但對弱勢者而言，因為沒什麼好失去的，所以「創新是弱勢者的義務」，改變不一定會成功，但不改變、不創新，原本位居弱勢者根本沒有成功的機會。 ',
            '1. 面對問題是解決問題的第一步。 2. 把小問題解決了，就沒有大問題。 3. 把所有的小問題都解決了，就根本沒有問題。 4. 你不解決問題，問題會解決你。',
            '當問題還不是問題的時候，你拿出來找人家幫忙，大家會幫你；然後當問題變成問題的時候，你再拿出來，只會被罵，人家都不敢幫你了。',
            '轉型正義三原則：解決現在的問題，避免以後再發生，最後才是追究歷史的責任。 重點是順序要對。',
            '死亡不應是人生的目的！所以人生只是一個過程，在這個過程當中尋找生命的意義。 ',
            '在一次3人筵席花了2萬6之後，隔天早上上廁所，看著那一坨大便，忽然大徹大悟：**人生的榮華富貴，不過就是「一坨大便」而已。** ',
            '記得一個概念：「a的n次方」。當n極大時，a小於1的時候其值趨於零；a大於1的時候則逼近無限大。你願意付出多於你從社會擷取的，這個社會就變得更好。反之人人都想要比付出的拿得更多，這個社會就會毀滅。 ',
            '認真的過每一天；可以的話，就快樂的過每一天；如果不行的話，就假裝快樂的過每一天。 ',
            '未知生，焉知死？」那不對！是「未知死，焉知生？」當你可以凝視死亡的時候，才可以轉過頭來看「人生是甚麼」。',
            '所謂⌈寄浮游於天地，秒蒼海之一栗⌋，人生不過數十寒暑，相對於地球45億年的歷史，實在微不足道。 ',
            '人生是單行道，沒有辦法回頭，所以沒有甚麼好後悔的，做自己，接受自己，對自己有合理的期望，這樣就好了。 ',
            '面臨困難的抉擇時，永遠要問：有沒有其他的辦法？ ',
            '世間萬物大多是「常態分佈」，比較極端的現象通常機率很低。所以遇到這種機率很低的局面時，就要考慮有可能根本不屬於這個常態分佈。 ',
            '不要怕失敗，才有機會成功。成功和失敗唯一的差別，就是意志力而已。 ',
        ];

        foreach ($quote as $content) {
            Quote::factory()
                ->create([
                    'content' => $content,
                    'author_id' => $author->id,
                ]);
        }
    }

    private function createAuthor(): Author
    {
        if (! Storage::disk()->exists('ko_wen-je.jpg')) {
            Storage::disk('public')
                ->put(path: 'ko_wen-je.jpg',
                    contents: file_get_contents('https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/%E6%9F%AF%E6%96%87%E5%93%B2_IMG_9322-1_%2814300234412%29_%28cropped%29.jpg/250px-%E6%9F%AF%E6%96%87%E5%93%B2_IMG_9322-1_%2814300234412%29_%28cropped%29.jpg')
                );
        }

        return Author::factory()
            ->create([
                'name' => '柯文哲 Ko Wen-je',
                'profession' => 'Mayor of Taipei',
                'avatar_url' => 'ko_wen-je.jpg',
            ]);
    }
}
