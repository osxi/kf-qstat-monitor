#!/usr/bin/env ruby

require 'date'
require 'nokogiri'
require 'pg'

load 'settings.rb'

db_con = PG.connect(dbname: 'txcmt')

['defe_tmp.xml', 'doom_tmp.xml', 'hard_tmp.xml', 'moon_tmp.xml', 'orig_tmp.xml'].each do |file|
  begin
    xml   = Nokogiri.XML(File.open(file))
    count = xml.xpath('/*/server/players/player').count
    max   = xml.xpath('/*/server/maxplayers').text.to_i
    port  = xml.xpath('/*/server/hostname').text.split(':').last.to_i

    db_con.exec("insert into log (cur_count, max_count, port, date) values (#{count}, #{max}, #{port}, current_timestamp)")
  rescue Exception => e
    raise "Could save data from #{file}: #{e}"
  end
end
